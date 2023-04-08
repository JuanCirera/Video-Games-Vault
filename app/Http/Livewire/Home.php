<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Providers\ApiServiceProvider as ProvidersApiServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public array $games = [];
    public string $search = "";

    protected $listeners = [
        "render" => "render"
    ];

    public function render()
    {

        $this->games = array_splice($this->games, 0);

        if ($this->search == "") {

            //NOTE: remember, si encuentra el nombre del dato lo devuelve, si no ejecuta la funcion
            $this->games = Cache::remember('games', 86400, function () { // NOTE: 24H de expiracion
                Log::info("API request: " . count($this->games) . " games fetched");
                return ProvidersApiServiceProvider::getVideogames();
            });
        } else {

            $this->games = Cache::remember($this->search, 86400, function () {
                Log::info("API request: search for '" . $this->search . "'");
                return ProvidersApiServiceProvider::searchGames($this->search);
            });
        }

        $welcome_img = (count($this->games)) ? $this->games[random_int(0, count($this->games) - 1)]->background_image : "/img/fondo_registro.jpg";

        return view('livewire.home', [
            "games" => $this->games,
            "welcome_img" => $welcome_img
        ]); //NOTE: el compact se puede cambiar por un array normal, asi se puede mandar de todo, no solo un string

    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
}
