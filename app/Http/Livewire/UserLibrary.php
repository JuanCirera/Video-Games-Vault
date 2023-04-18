<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;

class UserLibrary extends Component
{

    public User $user;

    public function render()
    {
        $categories=Category::all();
        return view('livewire.user-library',compact('categories'));
    }
}
