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
    public string $category;

    protected $rules=[
        "category" => ""
    ];

    public function render()
    {
        $categories=Category::all();

        return view('livewire.pages.profile.user-library',compact('categories'));
    }

    public function mount(){
        $this->videogame=new Videogame();
    }

    public function update(){
        $this->validate([
            "category" => ["required", "string", "exists:categories,name"]
        ]);

        // $this->videogame->save();
        // $this->user->videogames()->categories()->sync();

    }

}
