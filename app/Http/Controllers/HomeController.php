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
            // Log::info("Games loaded from cache");
        }else{
            $this->games=(new ProvidersApiServiceProvider)->getVideogames();
            Cache::put('games',$this->games);
            $games=$this->games;
            Log::info("Games loaded from API");
        }
        
        return view('home',compact('games'));
    }
}
