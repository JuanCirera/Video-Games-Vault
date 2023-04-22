<?php

namespace App\Http\Livewire;

use App\Providers\ApiServiceProvider;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class GameDetails extends Component
{
    // public $videogame;

    public function render()
    {
        $games = Cache::remember('games', 86400, fn () => (ApiServiceProvider::getVideogames()
        ));

        foreach ($games as $g) {
            if ($g->slug == substr(parse_url(url()->current(), PHP_URL_PATH), 7)) {
                $videogame = Cache::remember($g->slug, 86400, fn () => (ApiServiceProvider::getVideogameDetails($g->slug)
                ));

                if ($videogame->screenshots_count > 0) {
                    $screenshots = Cache::remember($g->slug . "_Screenshots", 86400, fn () => (ApiServiceProvider::getGameScreenshots($g->slug, 3)
                    ));
                }

                $achievements = Cache::remember($g->slug . "_Achievements", 86400, fn () => (ApiServiceProvider::getGameAchievements($g->slug, 3)
                ));

                if ($videogame->additions_count > 0) {
                    $additions = Cache::remember($g->slug . "_Additions", 86400, fn () => (ApiServiceProvider::getGameAdditions($g->slug, 3)
                    ));
                }

                $stores=Cache::remember("stores", 86400, fn () => (ApiServiceProvider::getStores()
                ));

                $gameStores = Cache::remember($g->slug . "_Stores", 86400, fn () => (ApiServiceProvider::getGameStores($g->slug)
                ));

            }
        }

        return view('livewire.pages.games.game-details', compact('videogame', 'screenshots', 'achievements', 'additions', 'stores', 'gameStores'));
    }

    // public function mount(){

    // }
}
