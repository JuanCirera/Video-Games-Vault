<?php

namespace App\Providers;

use Dotenv\Dotenv;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

$dotenv=Dotenv::createImmutable(__DIR__."/../../");
$dotenv->load();


class ApiServiceProvider extends ServiceProvider{

    // Toda esta clase hace uso de metodos estaticos para traer y devolver distintos datos de la API de RAWG

    public static function searchGames(string $search){
        define("searchGames","{$_ENV['URL_BASE']}games?key={$_ENV['API_KEY']}&search=".$search);
        Log::info("API request for search: {$search}");
        return json_decode(file_get_contents(searchGames))->results;
    }

    public static function getVideogames(int $size=20){
        define("games","{$_ENV['URL_BASE']}games?key={$_ENV['API_KEY']}&page_size={$size}");
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

    public static function getDevelopers(int $size=20){
        define("developers","{$_ENV['URL_BASE']}developers?key={$_ENV['API_KEY']}&page_size={$size}");
        Log::info("API request: developers fetched");
        return json_decode(file_get_contents(developers))->results;
    }

    public static function getAchievements(string $slug, int $size=20){
        define("achievements","{$_ENV['URL_BASE']}games/{$slug}/achievements?key={$_ENV['API_KEY']}&page_size={$size}");
        Log::info("API request: {$slug} achievements fetched");
        return json_decode(file_get_contents(achievements))->results;
    }

    public static function getAdditions(string $slug, int $size=20){
        define("additions","{$_ENV['URL_BASE']}games/{$slug}/additions?key={$_ENV['API_KEY']}&page_size={$size}");
        Log::info("API request: {$slug} achievements fetched");
        return json_decode(file_get_contents(additions))->results;
    }

}
