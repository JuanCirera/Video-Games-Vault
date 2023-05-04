<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{

    public string $userIcon="";

    public function render()
    {
        return view('livewire.navbar');
    }

}
