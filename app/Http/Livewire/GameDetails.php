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
        $videogame="";

        $games = Cache::remember('games', 86400, fn () => (
            ApiServiceProvider::getVideogames()
        ));

        foreach($games as $g){
            if($g->slug==substr(parse_url(url()->current(), PHP_URL_PATH), 7)){
                $videogame=Cache::remember($g->slug, 86400, fn () => (
                   ApiServiceProvider::getVideogameDetails($g->slug)
                ));
                $achievements=Cache::remember($g->slug."_Achievements", 86400, fn () => (
                    ApiServiceProvider::getAchievements($g->slug,3)
                 ));
            }
            // else{
            //     $this->redirect("home");
            // }
        }

        return view('livewire.pages.games.game-details',compact('videogame','achievements'));
    }

    // public function mount(){

    // }
}
