<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminProfile extends Component
{
    public function render()
    {
        session()->forget('resultPage');

        return view('livewire.pages.admin.admin-profile');
    }
}
