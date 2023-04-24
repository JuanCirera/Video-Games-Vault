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
        $videogames=Videogame::where("followed",true)->get();
        return view('livewire.pages.profile.user-tracking', compact('videogames'));
    }
}
