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


}
