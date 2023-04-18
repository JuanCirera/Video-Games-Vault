<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserFollowers extends Component
{
    public function render()
    {
        return view('livewire.pages.user-followers');
    }


}
