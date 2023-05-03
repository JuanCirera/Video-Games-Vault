<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use App\Models\Videogame;
use App\Providers\ApiServiceProvider;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use stdClass;

class GameDetails extends Component
{
    public User $user;
    public array $games = [], $additions = [];
    protected $videogame;
    public string $url="";
    public bool $addedToLibrary=false, $addedToTracking=false;
    public $screenshots, $stores, $gameStores, $achievements;

    public function render()
    {
        session()->forget('resultPage');
        // TODO: si se mete un slug por url llamar al API search
        if (Auth::user()) {
            $this->user = Auth::user();
        }

        return view(
            'livewire.pages.games.game-details',
            [
                'videogame' => $this->videogame,
                'screenshots' => $this->screenshots,
                'achievements' => $this->achievements,
                'additions' => $this->additions,
                'stores' => $this->stores,
                'gameStores' => $this->gameStores,
            ]
        );

    }

    public function mount(){

        $this->url=substr(parse_url(url()->current(), PHP_URL_PATH), 7);

        $this->games = Cache::remember('games', 86400, fn () => (ApiServiceProvider::getVideogames()
        ));
        // dd($this->games);

        foreach ($this->games as $g) {
            if ($g->slug == $this->url) {
                $this->videogame = Cache::remember($g->slug, 86400, fn () => (ApiServiceProvider::getVideogameDetails($g->slug)
                ));
            }
        }

        foreach ($this->games as $g) {

            if ($g->slug  == $this->url) {

                if ($this->videogame->screenshots_count > 0) {
                    $this->screenshots = Cache::remember($g->slug . "_Screenshots", 86400, fn () => (ApiServiceProvider::getGameScreenshots($g->slug, 3)
                    ));
                }

                $this->achievements = Cache::remember($g->slug . "_Achievements_Page_1", 86400, fn () => (ApiServiceProvider::getGameAchievements($g->slug, 40, 1)
                ));

                if(count($this->achievements)==40){
                    $page=2;

                    do{
                        $results=Cache::remember($g->slug . "_Achievements_Page_".$page, 86400, fn () => (ApiServiceProvider::getGameAchievements($g->slug, 40, $page)
                        ));

                        if($results){
                            $this->achievements = array_merge($this->achievements, $results);
                            $page++;
                        }else{
                            break;
                        }

                    }while(true);

                }


                if ($this->videogame->additions_count > 0) {
                    $this->additions = Cache::remember($g->slug . "_Additions", 86400, fn () => (ApiServiceProvider::getGameAdditions($g->slug, 3)
                    ));
                }

                $this->stores = Cache::remember("stores", 86400, fn () => (ApiServiceProvider::getStores()
                ));

                $this->gameStores = Cache::remember($g->slug . "_Stores", 86400, fn () => (ApiServiceProvider::getGameStores($g->slug)
                ));
            }
        }

        if(isset($this->user)){

            $userGames = $this->user->videogames()->get();

            foreach ($userGames as $ug) {
                if ($ug->title == $this->videogame->name) {
                    $this->addedToLibrary=true;
                    break;
                }
            }

            foreach ($userGames as $ug) {
                if ($ug->title == $this->videogame->name && $this->user->videogames()->wherePivot("videogame_id",$ug->id)->wherePivot("tracked",1)->first()) {
                    $this->addedToTracking=true;
                    break;
                }
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
                    return redirect("/games/{$cachedGame->slug}")->with("info_msg", "{$cachedGame->name} eliminado de la biblioteca");
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
                    "slug" => $cachedGame->slug,
                    "release_date" => $cachedGame->released,
                    "updated_date" => $cachedGame->updated,
                    "additions" => $cachedGame->additions_count,
                    "image" => $cachedGame->background_image,
                ]);
            }

            $this->user->videogames()->attach(Videogame::where('title',$cachedGame->name)->pluck('id'));

            return redirect(url()->previous())->with("success_msg", "Juego añadido a tu biblioteca");
        }

        return redirect(url()->previous())->with("error_msg", "El juego {$name} no se encuentra");
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

                    return redirect("/games/{$cachedGame->slug}")->with("info_msg", "Has dejado de seguir a {$cachedGame->name}");
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
                    "slug" => $cachedGame->slug,
                    "release_date" => $cachedGame->released,
                    "updated_date" => $cachedGame->updated,
                    "additions" => $cachedGame->additions_count,
                    "image" => $cachedGame->background_image,
                ]);

                $vg=Videogame::where("title","like",$cachedGame->name)->first();
                $vg->categories()->attach(5);
                $this->user->videogames()->attach(Videogame::where('title',$cachedGame->name)->pluck('id'));
            }

            return redirect(url()->previous())->with("success_msg", "Juego añadido a tu lista de seguimiento");
        }

        return redirect(url()->previous())->with("error_msg", "El juego {$name} no se encuentra");
    }

}
