<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use App\Models\Videogame;
use App\Providers\ApiServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class CreateReview extends Component
{
    public $videogames;
    public int $game_id;
    public bool $rating = true;
    public string $title = "", $body = "";
    public User $user;

    protected $rules = [
        "title" => "",
        "body" => "",
        "rating" => "",
        "game_id" => ""
    ];

    public function render()
    {
        $this->videogames = Cache::remember('games', 86400, function () {
            return ApiServiceProvider::getVideogames();
        });

        return view('livewire.pages.reviews.create-review', [
            "videogames" => $this->videogames
        ]);
    }

    public function mount()
    {
        if(Auth::user()){
            $this->user = Auth::user();
        }
    }

    public function store()
    {

        $games_id = [];

        foreach ($this->videogames as $g) {
            $games_id[] = $g["id"];
        }

        $games_id = implode(",", $games_id);

        $this->validate([
            "title" => ["required", "string", "min:3"],
            "body" => ["required", "string", "min:20"],
            "rating" => ["required", "boolean"],
            "game_id" => ["required", "numeric", "in:" . $games_id]
        ]);

        // Con esta comprobacion evito que el usuario escriba dos veces una reseña para el mismo juego
        foreach ($this->user->reviews()->get() as $review) {
            if ($review->user_id == $this->user->id) {
                return redirect(url()->previous())->with("error_msg", "No puedes escribir más reseñas para este juego");
            }
        }

        Review::create([
            "title" => $this->title,
            "body" => $this->body,
            "rating" => $this->rating,
            "user_id" => $this->user->id,
            "videogame_id" => $this->game_id
        ]);

        return redirect(url()->previous())->with("success_msg", "Reseña publicada!");
    }
}
