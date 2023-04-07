<?php

namespace App\Http\Controllers;

use App\Providers\ApiServiceProvider as ProvidersApiServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public array $games=[];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $games=[];

        if(Cache::get('games')){
            $games=Cache::get('games');
        }else{
            $this->games=(new ProvidersApiServiceProvider)->getVideogames();
            Cache::put('games', $this->games, 1440); // NOTE: 24H de expiracion
            $games=$this->games;
            Log::info("Games loaded from API");
        }

        $welcome_img=$games[random_int(0,count($games)-1)]->background_image;
        
        return view('home',compact('games','welcome_img'));
    }
}
