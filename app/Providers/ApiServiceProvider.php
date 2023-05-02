<?php

namespace App\Providers;

use Dotenv\Dotenv;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

$dotenv=Dotenv::createImmutable(__DIR__."/../../");
$dotenv->load();


class ApiServiceProvider extends ServiceProvider{

    // Toda esta clase hace uso de metodos estaticos para traer y devolver distintos datos de la API de RAWG

    // ** ESPECIFIC CONSULTS **

    public static function searchGames(string $search){
        define("searchGames","{$_ENV['URL_BASE']}games?key={$_ENV['API_KEY']}&search=".$search);
        try{
            Log::info("API request for search: {$search}");
            return json_decode(file_get_contents(searchGames))->results;
        }catch(Exception $e){
            return Log::warning("API request failed for search: {$search} !");
        }
    }

    public static function getVideogameDetails(string $slug){
        define("gameDetails","{$_ENV['URL_BASE']}games/{$slug}?key={$_ENV['API_KEY']}");
        try{
            Log::info("API request for {$slug} details");
            return json_decode(file_get_contents(gameDetails));
        }catch(Exception $e){
            return Log::warning("API request for {$slug} details failed!");
        }
    }

    public static function getGameScreenshots(string $slug, int $size=20){
        define("gameScreenshots","{$_ENV['URL_BASE']}games/{$slug}/screenshots?key={$_ENV['API_KEY']}&page_size={$size}");
        try{
            Log::info("API request: {$slug} screenshots fetched");
            return json_decode(file_get_contents(gameScreenshots))->results;
        }catch(Exception $e){
            return Log::warning("API request for {$slug} screenshots failed!");
        }
    }

    public static function getGameStores(string $slug, int $size=20){
        define("gameStores","{$_ENV['URL_BASE']}games/{$slug}/stores?key={$_ENV['API_KEY']}&page_size={$size}");
        try{
            Log::info("API request: {$slug} stores fetched");
            return json_decode(file_get_contents(gameStores))->results;
        }catch(Exception $e){
            return Log::warning("API request for {$slug} stores failed!");
        }
    }

    public static function getGameAchievements(string $slug, int $size=20, int $page=1){
        $apiRequest="{$_ENV['URL_BASE']}games/{$slug}/achievements?key={$_ENV['API_KEY']}&page_size={$size}&page={$page}";
        try{
            Log::info("API request: {$slug} achievements fetched");
            return json_decode(file_get_contents($apiRequest))->results;
        }catch(Exception $e){
            return Log::warning("API request for {$slug} achievements failed!");
        }
    }

    public static function getGameAdditions(string $slug, int $size=20){
        define("gameAdditions","{$_ENV['URL_BASE']}games/{$slug}/additions?key={$_ENV['API_KEY']}&page_size={$size}");
        try{
            Log::info("API request: {$slug} achievements fetched");
            return json_decode(file_get_contents(gameAdditions))->results;
        }catch(Exception $e){
            return Log::warning("API request for {$slug} additions failed!");
        }
    }


    // ** GENERAL CONSULTS **

    public static function getVideogames(int $size=20){
        define("games","{$_ENV['URL_BASE']}games?key={$_ENV['API_KEY']}&page_size={$size}");
        try{
            Log::info("API request: 20 games fetched");
            return json_decode(file_get_contents(games))->results;
        }catch(Exception $e){
            return Log::warning("API request failed, 0 games fetched!");
        }
    }

    public static function getPlatforms(){
        define("platforms","{$_ENV['URL_BASE']}platforms?key={$_ENV['API_KEY']}");
        try{
            Log::info("API request: platforms fetched");
            return json_decode(file_get_contents(platforms))->results;
        }catch(Exception $e){
            return Log::warning("API request failed, 0 platforms fetched!");
        }
    }

    public static function getGenres(){
        define("genres","{$_ENV['URL_BASE']}genres?key={$_ENV['API_KEY']}");
        try{
            Log::info("API request: genres fetched");
            return json_decode(file_get_contents(genres))->results;
        }catch(Exception $e){
            return Log::warning("API request failed, 0 genres fetched!");
        }
    }

    public static function getDevelopers(int $size=20){
        define("developers","{$_ENV['URL_BASE']}developers?key={$_ENV['API_KEY']}&page_size={$size}");
        try{
            Log::info("API request: developers fetched");
            return json_decode(file_get_contents(developers))->results;
        }catch(Exception $e){
            return Log::warning("API request failed, 0 developers fetched!");
        }
    }

    public static function getStores(int $size=10){
        define("stores","{$_ENV['URL_BASE']}stores?key={$_ENV['API_KEY']}&page_size={$size}");
        try{
            Log::info("API request: {$size} stores fetched");
            return json_decode(file_get_contents(stores))->results;
        }catch(Exception $e){
            return Log::warning("API request failed, 0 stores fetched!");
        }
    }


}
