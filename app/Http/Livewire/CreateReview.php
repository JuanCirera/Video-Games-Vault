<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use App\Models\Videogame;
use App\Providers\ApiServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class CreateReview extends Component
{
    public $videogames;
    public int $game_id;
    public bool $rating=true;
    public string $title="", $body="";
    public User $user;

    protected $rules=[
        "title" => "",
        "body" => "",
        "rating" => "",
        "game_id" => ""
    ];

    public function render()
    {
        $this->videogames=Cache::remember('games',86400, function (){
            return ApiServiceProvider::getVideogames();
        });

        return view('livewire.pages.profile.create-review',[
            "videogames" => $this->videogames
        ]);
    }

    public function mount(){
        $this->user=Auth::user();
    }

    public function store(){

        $games_id=[];

        foreach($this->videogames as $g){
            $games_id[]=$g["id"];
        }

        $games_id=implode(",",$games_id);

        $this->validate([
            "title" => ["required","string","min:3"],
            "body" => ["required","string","min:20"],
            "rating" => ["required","boolean"],
            "game_id" => ["required","numeric","in:".$games_id]
        ]);

        Review::create([
            "title" => $this->title,
            "body" => $this->body,
            "rating" => $this->rating,
            "user_id" => $this->user->id,
            "videogame_id" => $this->game_id
        ]);

        return redirect("profile/{$this->user->username}")->with("success_msg","¡Primera reseña creada!");
    }
}
