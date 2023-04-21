<?php

namespace App\Providers;

use Dotenv\Dotenv;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

$dotenv=Dotenv::createImmutable(__DIR__."/../../");
$dotenv->load();


class ApiServiceProvider extends ServiceProvider{

    // private array $videogames=[];
    // private array $platforms=[];
    // private array $developers=[];
    // private array $genres=[];

    // public function __construct()
    // {

    //     // define("games","{$_ENV['URL_BASE']}games?key={$_ENV['API_KEY']}");
    //     // $this->videogames=json_decode(file_get_contents(games))->results;

    //     // define("genres","{$_ENV['URL_BASE']}genres?key={$_ENV['API_KEY']}");

    //     // $this->genres=json_decode(file_get_contents(genres));

    // }


    public static function searchGames(string $search){
        define("searchGames","{$_ENV['URL_BASE']}games?key={$_ENV['API_KEY']}&search=".$search);
        Log::info("API request for search: {$search}");
        return json_decode(file_get_contents(searchGames))->results;
    }

    public static function getVideogames(){
        define("games","{$_ENV['URL_BASE']}games?key={$_ENV['API_KEY']}");
        Log::info("API request: 20 games fetched");
        return json_decode(file_get_contents(games))->results;
    }

    public static function getVideogameDetails(string $slug){
        define("gameDetails","{$_ENV['URL_BASE']}games/{$slug}?key={$_ENV['API_KEY']}");
        Log::info("API request for {$slug} details");
        return json_decode(file_get_contents(gameDetails));
        // NOTE: hay algunos json sin el nivel results
    }

    public static function getPlatforms(){
        define("platforms","{$_ENV['URL_BASE']}platforms?key={$_ENV['API_KEY']}");
        Log::info("API request: platforms fetched");
        return json_decode(file_get_contents(platforms))->results;
    }

    public static function getGenres(){
        define("genres","{$_ENV['URL_BASE']}genres?key={$_ENV['API_KEY']}");
        Log::info("API request: genres fetched");
        return json_decode(file_get_contents(genres))->results;
    }

    public static function getDevelopers(){
        define("developers","{$_ENV['URL_BASE']}developers?key={$_ENV['API_KEY']}");
        Log::info("API request: developers fetched");
        return json_decode(file_get_contents(developers))->results;
    }

    public static function getAchievements(string $slug){
        define("achievements","{$_ENV['URL_BASE']}games/{$slug}/achievements?key={$_ENV['API_KEY']}");
        Log::info("API request: {$slug} achievements fetched");
        return json_decode(file_get_contents(achievements))->results;
    }

}
