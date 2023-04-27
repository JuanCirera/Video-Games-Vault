<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use App\Providers\ApiServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

use function Ramsey\Uuid\v1;

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
        $this->games = Cache::remember('games', 86400, fn () => (ApiServiceProvider::getVideogames()
        ));

        foreach ($this->games as $g) {
            if ($g->slug == $this->url) {
                $this->videogame = Cache::remember($g->slug, 86400, fn () => (ApiServiceProvider::getVideogameDetails($g->slug)
                ));
            }
        }

        if(isset($this->videogame)){
            $this->reviews = Review::where("videogame_id",$this->videogame->id)->orderBy($this->field,$this->order)->get();
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
        //NOTE: el mount SOLO se ejecuta la primera vez que carga la vista, no se llama al actualizar elementos con model
        $this->url=substr(parse_url(url()->current(), PHP_URL_PATH), 7);
    }

    public function sort($field){
        $this->field=$field;
        $this->order=($this->order=="desc")?"asc":"desc";
    }

}
