<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserFollowers extends Component
{
    public function render()
    {
        // $followers=User::;
        return view('livewire.pages.user-followers');
    }


}
