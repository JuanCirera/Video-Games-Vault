<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{

    public string $searchIcon="fa-solid fa-magnifying-glass";

    public string $inputSearch="";

    public function render()
    {
        return view('livewire.navbar');
    }


    public function search(){
        
    }

}
