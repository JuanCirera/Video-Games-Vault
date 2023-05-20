<?php

namespace App\Http\Livewire;

use App\Mail\NotifyUser;
use App\Models\User;
use App\Models\Videogame;
use App\Notifications\ReleaseNotify;
use App\Notifications\UpdateNotify;
use App\Providers\ApiServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class UserTracking extends Component
{
    public User $user;

    public $videogames;

    public function render()
    {
        $this->videogames = $this->user->videogames()->wherePivot("tracked", 1)->get();
        $this->notifyRelease();

        return view('livewire.pages.profile.user-tracking', ["videogames" => $this->videogames]);
    }


    public function stopTracking(Videogame $game)
    {
        if ($this->user) {

            //Si el usuario tiene ya añadido el juego a su biblioteca se devuelve true y no se añade
            foreach ($this->user->videogames as $ug) {
                if ($ug->slug == $game->slug && $this->user->videogames()->wherePivot("videogame_id", $ug->id)->wherePivot("tracked", 1)->first()) {
                    $this->user->videogames()->updateExistingPivot($ug->id, ["tracked" => 0]);

                    return redirect(url()->previous())->with("info_msg", "Has dejado de seguir a {$game->title}");
                }
            }
        }
        return redirect('login');
    }


    public function notifyRelease()
    {
        if ($this->user->notifyGames) {
            foreach ($this->videogames as $game) {
                if ($game->release_date == date(now())) {
                    $this->user->notify(new ReleaseNotify($game->name));
                }
            }
        }
    }


    public static function checkDataUpdate()
    {
        $user=Auth()->user();
        $videogames=$user->videogames()->wherePivot("tracked", 1)->get();

        foreach ($videogames as $game) {
            //Se traen los datos más recientes del juego
            $apiGame = ApiServiceProvider::getVideogameDetails($game->slug);

            //Se guardan en cache
            Cache::set($game->slug, $apiGame, 86400);

            //Si la fecha de la API que es la más actualizada es mayor que la fecha de la BD,
            //se utiliza Carbon para comparar las fechas
            if (Carbon::parse($apiGame->updated)->lt(Carbon::parse(str_replace('T', ' ', $game->updated_date)))) {
                //Se guarda la nueva fecha en la BD
                $game->updated_date = $apiGame->updated;
                //Se notifica al usuario
                self::notifyUpdate();
            }
        }
        Log::info('Scheduled task for checkDataUpdate executed');
    }


    public static function notifyUpdate()
    {
        $user=Auth()->user();
        $videogames=$user->videogames()->wherePivot("tracked", 1)->get();

        if ($user->notifyGames) {
            foreach ($videogames as $game) {
                if (Carbon::parse($game->updated_date)->eq(Carbon::parse(date(now())) || Carbon::parse($game->updated_date)->gt(Carbon::parse(date(now()))))) {
                    $user->notify(new UpdateNotify($game->title, $game->slug));
                }
            }
        }
    }
}
