<?php

namespace App\Http\Livewire;

use App\Mail\NotifyUser;
use App\Models\User;
use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
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
    }

    public function notifyRelease()
    {
        foreach ($this->videogames as $game) {
            if ($game->release_date==date(now())) {
                $mailContent =
                    '<div>
                    <p style="margin-top: 5vh; text-align: center; font-size: 1.5vh">
                    ¡'. $game->title . ' ha salido a la venta!
                    </p>
                    </div>';

                Mail::to($this->user->email)->send(new NotifyUser([
                    "content" => $mailContent
                ]));
            }
        }
    }

    public function notifyDLC()
    {
        // foreach ($this->videogames as $game) {
        //     if ($game->additions>) {
        //         $mailContent =
        //             '<div>
        //             <p style="margin-top: 5vh; text-align: center; font-size: 1.5vh">
        //             ¡'. $game->title . ' ha salido a la venta!
        //             </p>
        //             </div>';

        //         Mail::to($this->user->email)->send(new NotifyUser([
        //             "content" => $mailContent
        //         ]));
        //     }
        // }
    }

    public function notifyUpdate()
    {
    }
}
