<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\User;
use App\Models\Videogame;
use Livewire\Component;

class UserLibrary extends Component
{

    public User $user;
    public Videogame $videogame;

    public function render()
    {
        $categories=Category::all();

        return view('livewire.pages.profile.user-library',compact("categories"));
    }

}
