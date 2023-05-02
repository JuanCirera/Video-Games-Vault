<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        session()->forget('resultPage');
        return view('livewire.pages.contact.contact');
    }
}
