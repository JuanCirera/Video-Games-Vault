<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use App\Providers\ApiServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowReviews extends Component
{
    public string $order="desc", $field="title";
    public User $user;
    protected $videogame;
    public $games;
    public $reviews=[];
    public $url;


    public function render()
    {
        if(isset($this->videogame)){
            $this->reviews = Review::where("videogame_id",$this->videogame->id)->orderBy($this->field,$this->order)->get();
            Log::debug($this->reviews);
        }

        if(isset($this->user)){
            $this->reviews = Review::where("user_id",$this->user->id)->orderBy($this->field,$this->order)->get();
        }

        return view('livewire.pages.show-reviews',
        [
            "reviews" => $this->reviews,
            "videogame" => $this->videogame
        ]);

    }

    public function mount(){
        $this->url=substr(parse_url(url()->current(), PHP_URL_PATH), 7);

        $this->games = Cache::remember('games', 86400, fn () => (ApiServiceProvider::getVideogames()
        ));

        foreach ($this->games as $g) {
            if ($g->slug == $this->url) {
                $this->videogame = Cache::remember($g->slug, 86400, fn () => (ApiServiceProvider::getVideogameDetails($g->slug)
                ));
            }
        }

    }

    public function sort($field){
        $this->field=$field;
        $this->order=($this->order=="desc")?"asc":"desc";
        // dd(Review::where("videogame_id",$this->videogame->id)->orderBy($this->field,$this->order)->get());
    }

}
