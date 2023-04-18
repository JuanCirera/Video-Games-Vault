<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserFollowers extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.pages.profile.user-followers');
    }

    public function profile(){
        // return view('livewire.pages.profile.user-profile', [
        //     'user' => $this->user
        // ]);
            dd("HOLAAAAA");
        // $this->emitTo('user-profile','render');
    }

}
