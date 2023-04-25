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
    // public int $category;
    protected $rules=[
        "category" => ""
    ];

    public function render()
    {
        $categories=Category::all();

        return view('livewire.pages.profile.user-library',compact('categories'));
    }

    // public function mount(){
    //     $this->videogame=new Videogame();
    // }

    public function update(Videogame $game){
        dd($game);
        $this->validate([
            "category" => ["required", "numeric", "exists:categories,id"]
        ]);

        $game->categories()->detach();
        $game->categories()->attach($this->category);

        return redirect("/{$this->user->username}");

    }

}
