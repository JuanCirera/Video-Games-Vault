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
    // public $categoryID;
    // protected $rules=[
    //     "category" => ""
    // ];

    public function render()
    {
        $categories=Category::all();

        return view('livewire.pages.profile.user-library',compact("categories"));
    }

    // public function mount(){
    //     $this->videogame=new Videogame();
    // }

    // public function update(Videogame $game, Category $newCategory){
    //     // dd($game);
    //     // $this->validate([
    //     //     "category" => ["required", "numeric", "exists:categories,id"]
    //     // ]);

    //     $this->user->videogames()->wherePivot("videogame_id",$game->id)->attach($newCategory->name);
    //     $game->categories()->attach($this->category_id);

    //     return redirect("/{$this->user->username}");

    // }

    // public function updatedCategoryID(){
    //     // dd("HOLA");
    //     $game->categories()->detach();
    //     $game->categories()->attach($this->category_id);

    //     $this->categoryID=null;

    //     return redirect("/{$this->user->username}");
    // }

}
