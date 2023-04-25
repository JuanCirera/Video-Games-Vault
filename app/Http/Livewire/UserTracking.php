<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Videogame;
use Livewire\Component;

class UserTracking extends Component
{
    public User $user;

    public function render()
    {
        // $videogames=Videogame::where("followed",true)->get();
        // $this->user->videogames()->pluck("tracked");
        $videogames=$this->user->videogames()->wherePivot("tracked",1)->get();

        return view('livewire.pages.profile.user-tracking', compact('videogames'));
    }

    public function stopTracking(Videogame $game)
    {
        // Videogame
        // $userGames = Auth::user()->videogames()->get();
        // $cachedGame = Cache::get($slug);

        //Se comprueba si el juego esta en cache
        // if ($cachedGame) {

            //Si el usuario tiene ya añadido el juego a su biblioteca se devuelve true y no se añade
            // foreach ($this->user->videogames as $ug) {
            //     if ($ug->title == $cachedGame->name && $ug->followed) {
            //         $ug->update([
            //             "followed" => false
            //         ]);
            //         return redirect("/games/{$cachedGame->slug}")->with("info_msg", "Has dejado de seguir a {$cachedGame->name}");
            //     }
            // }

            //Ahota se comprueba que no exista ya en la BD
            $title=$game->title;
            $existsInDB = false;
            $dbGames = Videogame::all();

            foreach ($dbGames as $dbGame) {
                if ($dbGame->id == $game->id) {
                    $existsInDB = true;
                    break;
                }
            }

            if($existsInDB){
                $this->user->videogames()->detach($game->id);
                $this->user->videogames()->attach($game->id);

                return redirect("/{$this->user->username}")->with("info_msg", "Has dejado de seguir a {$title}");
            }else{
                return redirect("/{$this->user->username}")->with("error_msg", "El juego {$title} no se ha podido encontrar");
            }

            //Si no exsite se crea un nuevo registro
            // if (!$existsInDB) {
                // Videogame::create([
                //     "title" => $cachedGame->name,
                //     "release_date" => $cachedGame->released,
                //     "updated_date" => $cachedGame->updated,
                //     "additions" => $cachedGame->additions_count,
                //     "image" => $cachedGame->background_image,
                //     "followed" => true
                // ]);

                // $vg=Videogame::where("title","like",$cachedGame->name)->first();
                // $vg->categories()->attach(5);
                // $this->user->videogames()->attach(Videogame::where('title',$cachedGame->name)->pluck('id'));
            // }

            // return redirect("/games/{$cachedGame->slug}")->with("success_msg", "Juego añadido a tu lista de seguimiento");
        // }

        // return redirect("/games/{$cachedGame->slug}")->with("error_msg", "El juego {$name} no se encuentra");
    }

}
