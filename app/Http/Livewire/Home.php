<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\User;
use App\Models\Videogame;
use Livewire\Component;
use App\Providers\ApiServiceProvider as ProvidersApiServiceProvider;
use Error;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Exceptions\CorruptComponentPayloadException;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public array $games = [];
    public string $search = "";
    public User $user;
    public bool $addedToLibrary = false, $addedToTracking = false;
    protected $videogame;
    public $resultPage;
    protected string $field = "";
    public $order = "-";

    protected $listeners = [
        "render" => "render"
    ];

    public function render()
    {
        //Esto es por si la vista se vuelve a cargar, para que empiece de nuevo la paginacion
        if ($this->resultPage != 1) {
            session()->forget('resultPage');
        }

        if ($this->search == "" && $this->field == "") {
            if (count($this->games) <= 40) {
                //NOTE: remember, si encuentra el nombre del dato lo devuelve, si no ejecuta la funcion
                $this->games = Cache::remember('games', 86400, fn () => ( // NOTE: 24H de expiracion
                    ProvidersApiServiceProvider::getVideogames(40, 1)
                ));
            }
        // ** ORDENACION **
        } else if ($this->field != "") {
            $this->games = Cache::remember('games' . $this->field, 86400, fn () => (ProvidersApiServiceProvider::getVideogames(40, 1, $this->field)
            ));
        // ** BUSQUEDA **
        } else {
            $this->games =  Cache::remember("search_for_".$this->search, 86400, fn () => (ProvidersApiServiceProvider::searchGames($this->search)
            ));
        }

        $welcome_img = (count($this->games)) ? $this->games[random_int(0, count($this->games) - 1)]->background_image : "/img/fondo_registro.jpg";

        return view('livewire.home', [
            // "games" => $this->games, TODO:
            "welcome_img" => $welcome_img
        ]); //NOTE: el compact se puede cambiar por un array normal, asi se puede mandar de todo, no solo un string

    }

    public function mount()
    {
        if (Auth::user()) {
            $this->user = Auth::user();
        }

        $this->resultPage = session()->get('resultPage', 1);
        // $this->games=[];
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function addToLibrary(string $name, string $slug)
    {
        if ($this->user) {

            foreach ($this->games as $g) {
                if ($g["slug"] == $slug) {
                    $currentGame = Cache::remember($slug, 86400, fn () => (ProvidersApiServiceProvider::getVideogameDetails($slug)
                    ));
                }
            }

            //Se comprueba si el juego esta en cache
            if (isset($currentGame)) {

                //Si el usuario tiene ya añadido el juego a su biblioteca se devuelve true y no se añade
                foreach ($this->user->videogames as $ug) {
                    if ($ug->title == $currentGame->name) {
                        $ug->delete();
                        return redirect(url()->previous())->with("info_msg", "{$currentGame->name} eliminado de la biblioteca");
                    }
                }

                //Ahora se comprueba que no exista ya en la BD
                $existsInDB = false;
                $dbGames = Videogame::all();

                foreach ($dbGames as $dbGame) {
                    if ($dbGame->title == $name) {
                        $existsInDB = true;
                        break;
                    }
                }

                //Si no exsite se crea un nuevo registro
                if (!$existsInDB) {
                    Videogame::create([
                        "title" => $currentGame->name,
                        "slug" => $slug,
                        "release_date" => $currentGame->released,
                        "updated_date" => $currentGame->updated,
                        "additions" => $currentGame->additions_count,
                        "image" => $currentGame->background_image,
                    ]);
                }

                $this->user->videogames()->attach(Videogame::where('title', $currentGame->name)->pluck('id'));

                return redirect(url()->previous())->with("success_msg", "Juego añadido a tu biblioteca");
            }
            return redirect(url()->previous())->with("error_msg", "El juego {$name} no se encuentra");
        }
        return redirect('login');
    }


    public function addToTracking(string $name, string $slug)
    {
        if ($this->user) {

            foreach ($this->games as $g) {
                if ($g["slug"] == $slug) {
                    $currentGame = Cache::remember($slug, 86400, fn () => (ProvidersApiServiceProvider::getVideogameDetails($slug)
                    ));
                }
            }

            //Se comprueba si el juego esta en cache
            if ($currentGame) {

                //Si el usuario tiene ya añadido el juego a su biblioteca se devuelve true y no se añade
                foreach ($this->user->videogames as $ug) {
                    if ($ug->title == $currentGame->name && $this->user->videogames()->wherePivot("videogame_id", $ug->id)->wherePivot("tracked", 1)->first()) {
                        $this->user->videogames()->updateExistingPivot($ug->id, ["tracked" => 0]);

                        return redirect(url()->previous())->with("info_msg", "Has dejado de seguir a {$currentGame->name}");
                    }
                }

                //Ahota se comprueba que no exista ya en la BD
                $existsInDB = false;
                $dbGames = Videogame::all();

                foreach ($dbGames as $dbGame) {
                    if ($dbGame->title == $name) {
                        $existsInDB = true;
                        $this->user->videogames()->updateExistingPivot($dbGame->id, ["tracked" => 1]);
                        break;
                    }
                }

                //Si no exsite se crea un nuevo registro
                if (!$existsInDB) {
                    Videogame::create([
                        "title" => $currentGame->name,
                        "slug" => $slug,
                        "release_date" => $currentGame->released,
                        "updated_date" => $currentGame->updated,
                        "additions" => $currentGame->additions_count,
                        "image" => $currentGame->background_image,
                    ]);


                    $this->user->videogames()->attach(Videogame::where('title', $currentGame->name)->pluck('id'));
                }

                return redirect(url()->previous())->with("success_msg", "Juego añadido a tu lista de seguimiento");
            }
            return redirect(url()->previous())->with("error_msg", "El juego {$name} no se encuentra");
        }
        return redirect('login');
    }


    public function order(string $field = "")
    {
        $this->order = ($this->order == "-") ? "" : "-";
        $this->field = $this->order . $field;
    }


    public function loadMore()
    {
        //Lo unico que se me ha ocurrido para guardar el valor de la página
        //es meterlo en una var de sesion, asi al recargar no se resetea,
        //aunque lo hará al cambiar de ruta
        $this->resultPage++;
        session(['resultPage' => $this->resultPage]);

        $results = Cache::remember('games_page_' . $this->resultPage, 86400, function () {
            return ProvidersApiServiceProvider::getVideogames(40, $this->resultPage, $this->field);
        });

        if ($results) {
            // Para no perder el json y poder seguir trabajando con StdClass se hace un array_merge y se convierte
            // a json, despues se convierte de nuevo a un array con clases StdClass como estaba en la 1a llamada a la API
            $mergedGames = json_encode(array_merge($this->games, $results));
            $this->games = json_decode($mergedGames);

            //Esto es necesario para que a los juegos iniciales en cache se les sume los nuevos que se han cargado en la vista
            if (Cache::get('games')) {
                Cache::forget('games');
            } else {
                Cache::set('games', $this->games, 86400);
            };
        }
    }
}
