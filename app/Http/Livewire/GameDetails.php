<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Videogame;
use App\Providers\ApiServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use stdClass;

class GameDetails extends Component
{
    public User $user;
    public array $games = [];
    protected $videogame;
    public string $url="";
    public bool $addedToLibrary=false, $addedToTracking=false;

    public function render()
    {
        // TODO: si se mete un slug por url llamar al API search

        foreach ($this->games as $g) {

            if ($g->slug == $this->url) {

                if ($this->videogame->screenshots_count > 0) {
                    $screenshots = Cache::remember($g->slug . "_Screenshots", 86400, fn () => (ApiServiceProvider::getGameScreenshots($g->slug, 3)
                    ));
                }

                $achievements = Cache::remember($g->slug . "_Achievements", 86400, fn () => (ApiServiceProvider::getGameAchievements($g->slug, 3)
                ));

                if ($this->videogame->additions_count > 0) {
                    $additions = Cache::remember($g->slug . "_Additions", 86400, fn () => (ApiServiceProvider::getGameAdditions($g->slug, 3)
                    ));
                }

                $stores = Cache::remember("stores", 86400, fn () => (ApiServiceProvider::getStores()
                ));

                $gameStores = Cache::remember($g->slug . "_Stores", 86400, fn () => (ApiServiceProvider::getGameStores($g->slug)
                ));
            }
        }

        return view(
            'livewire.pages.games.game-details',
            [
                'videogame' => $this->videogame,
                'screenshots' => $screenshots,
                'achievements' => $achievements,
                'additions' => $additions,
                'stores' => $stores,
                'gameStores' => $gameStores
            ]
        );
    }

    public function mount(){

        $this->url=substr(parse_url(url()->current(), PHP_URL_PATH), 7);

        if (Auth::user()) {
            $this->user = Auth::user();
        }

        $this->games = Cache::remember('games', 86400, fn () => (ApiServiceProvider::getVideogames()
        ));

        foreach ($this->games as $g) {
            if ($g->slug == $this->url) {
                $this->videogame = Cache::remember($g->slug, 86400, fn () => (ApiServiceProvider::getVideogameDetails($g->slug)
                ));
            }
        }

        $userGames = Auth::user()->videogames()->get();

        foreach ($userGames as $ug) {
            if ($ug->title == $this->videogame->name) {
                $this->addedToLibrary=true;
                break;
            }
        }

        foreach ($userGames as $ug) {
            if ($ug->title == $this->videogame->name && $ug->followed) {
                $this->addedToTracking=true;
                break;
            }
        }

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
                    return redirect("/games/{$cachedGame->slug}")->with("success_msg", "{$cachedGame->name} eliminado de la biblioteca");
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
                    "release_date" => $cachedGame->released,
                    "updated_date" => $cachedGame->updated,
                    "additions" => $cachedGame->additions_count,
                ]);
            }

            $vg=Videogame::where("title","like",$cachedGame->name)->first();
            $vg->categories()->attach(5);
            $this->user->videogames()->attach(Videogame::where('title',$cachedGame->name)->pluck('id'));

            return redirect("/games/{$cachedGame->slug}")->with("success_msg", "Juego añadido a tu biblioteca");
        }

        // return redirect("/games/{$this->->slug}")->with("error_msg", "El juego {$name} no se encuentra");
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
                if ($ug->title == $cachedGame->name && $ug->followed) {
                    $ug->update([
                        "followed" => false
                    ]);
                    return redirect("/games/{$cachedGame->slug}")->with("success_msg", "Has dejado de seguir a {$cachedGame->name}");
                }
            }

            //Ahota se comprueba que no exista ya en la BD
            $existsInDB = false;
            $dbGames = Videogame::all();

            foreach ($dbGames as $dbGame) {
                if ($dbGame->title == $name) {
                    $existsInDB = true;
                    $dbGame->update([
                        "followed" => true
                    ]);
                    break;
                }
            }

            //Si no exsite se crea un nuevo registro
            if (!$existsInDB) {
                Videogame::create([
                    "title" => $cachedGame->name,
                    "release_date" => $cachedGame->released,
                    "updated_date" => $cachedGame->updated,
                    "additions" => $cachedGame->additions_count,
                    "followed" => true
                ]);

                $vg=Videogame::where("title","like",$cachedGame->name)->first();
                $vg->categories()->attach(5);
                $this->user->videogames()->attach(Videogame::where('title',$cachedGame->name)->pluck('id'));
            }

            return redirect("/games/{$cachedGame->slug}")->with("success_msg", "Juego añadido a tu lista de seguimiento");
        }

        return redirect("/games/{$cachedGame->slug}")->with("error_msg", "El juego {$name} no se encuentra");
    }


    // public function removeFromLibrary(string $name, string $slug){

    // }
}
