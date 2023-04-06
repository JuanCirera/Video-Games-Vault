<?php

namespace App\Providers;

use Dotenv\Dotenv;
use Illuminate\Support\ServiceProvider;

$dotenv=Dotenv::createImmutable(__DIR__."/../../");
$dotenv->load();


class ApiServiceProvider extends ServiceProvider{

    private array $videogames=[];
    private array $platforms=[];
    private array $developers=[];
    private array $genres=[];

    public function __construct()
    {
        
        define("games","{$_ENV['URL_BASE']}games?key={$_ENV['API_KEY']}");
        $this->videogames=json_decode(file_get_contents(games))->results;
            
        // }

        // define("genres","{$_ENV['URL_BASE']}genres?key={$_ENV['API_KEY']}");

        // $this->genres=json_decode(file_get_contents(genres));

    }

    
    public function getVideogames(){
        return $this->videogames;
    }


    public function getPlatforms(){
        return $this->platforms;
    }


    public function getDevelopers(){
        return $this->developers;
    }


    public function getGenres(){
        return $this->genres;
    }


}