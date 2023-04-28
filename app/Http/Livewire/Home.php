<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\User;
use App\Models\Videogame;
use Livewire\Component;
use App\Providers\ApiServiceProvider as ProvidersApiServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public array $games = [];
    public string $search = "";
    public User $user;
    public bool $addedToLibrary=false, $addedToTracking=false;
    protected $videogame;

    protected $listeners = [
        "render" => "render"
    ];

    public function render()
    {

        $this->games = array_splice($this->games, 0);

        if ($this->search == "") {

            //NOTE: remember, si encuentra el nombre del dato lo devuelve, si no ejecuta la funcion
            $this->games = Cache::remember('games', 86400, function () { // NOTE: 24H de expiracion
                return ProvidersApiServiceProvider::getVideogames();
            });
        } else {

            $this->games = Cache::remember($this->search, 86400, function () {
                return ProvidersApiServiceProvider::searchGames($this->search);
            });
        }

        $welcome_img = (count($this->games)) ? $this->games[random_int(0, count($this->games) - 1)]->background_image : "/img/fondo_registro.jpg";

        return view('livewire.home', [
            "games" => $this->games,
            "welcome_img" => $welcome_img
        ]); //NOTE: el compact se puede cambiar por un array normal, asi se puede mandar de todo, no solo un string

    }

    public function mount(){
        $this->user=(Auth::user())?Auth::user():(new User());
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function addToLibrary(string $name, string $slug)
    {
        $userGames = Auth::user()->videogames()->get();
        $cachedGame = Cache::get($slug);

        //Se comprueba si el juego esta en cache
        if ($cachedGame) {

            //Si el usuario tiene ya añadido el juego a su biblioteca se devuelve true y no se añade
            foreach ($this->user->videogames as $ug) {
                if ($ug->title == $cachedGame->name) {
                    $ug->delete();
                    return redirect("/home")->with("info_msg", "{$cachedGame->name} eliminado de la biblioteca");
                }
            }

            //Ahota se comprueba que no exista ya en la BD
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
                    "title" => $cachedGame->name,
                    "slug" => $slug,
                    "release_date" => $cachedGame->released,
                    "updated_date" => $cachedGame->updated,
                    "additions" => $cachedGame->additions_count,
                    "image" => $cachedGame->background_image,
                ]);
            }

            $vg=Videogame::where("title","like",$cachedGame->name)->first();
            // $vg->categories()->attach(5);
            // $this->user->videogames()->wherePivot("videogame_id",$vg->id)->attach("sin categoria");
            $this->user->videogames()->attach(Videogame::where('title',$cachedGame->name)->pluck('id'));

            return redirect("/games/{$cachedGame->slug}")->with("success_msg", "Juego añadido a tu biblioteca");
        }

        return false;
    }


    public function addToTracking(string $name, string $slug)
    {
        $userGames = Auth::user()->videogames()->get();
        $cachedGame = Cache::get($slug);

        //Se comprueba si el juego esta en cache
        if ($cachedGame) {

            //Si el usuario tiene ya añadido el juego a su biblioteca se devuelve true y no se añade
            foreach ($this->user->videogames as $ug) {
                if ($ug->title == $cachedGame->name && $this->user->videogames()->wherePivot("videogame_id",$ug->id)->wherePivot("tracked",1)->first()) {
                    $this->user->videogames()->updateExistingPivot($ug->id, ["tracked" => 0]);

                    return redirect("/home")->with("info_msg", "Has dejado de seguir a {$cachedGame->name}");
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
                    "title" => $cachedGame->name,
                    "slug" => $slug,
                    "release_date" => $cachedGame->released,
                    "updated_date" => $cachedGame->updated,
                    "additions" => $cachedGame->additions_count,
                    "image" => $cachedGame->background_image,
                ]);

                $vg=Videogame::where("title","like",$cachedGame->name)->first();
                $vg->categories()->attach(5);
                $this->user->videogames()->attach(Videogame::where('title',$cachedGame->name)->pluck('id'));
            }

            return redirect("/home")->with("success_msg", "Juego añadido a tu lista de seguimiento");
        }

        return redirect("/home")->with("error_msg", "El juego {$name} no se encuentra");
    }
}
