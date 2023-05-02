<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        session()->forget('resultPage');
        return view('livewire.pages.about-us');
    }
}
