<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\User;
use App\Models\Videogame;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowUserGamesByCategory extends Component
{
    public User $user;
    public string $category;
    public Collection $categories;

    public function render()
    {
        return view('livewire..pages.profile.show-user-games-by-category');
    }

    public function update(Videogame $game, Category $newCategory){

        $this->user->videogames()->wherePivot("videogame_id",$game->id)->updateExistingPivot($game->id,["category"=>$newCategory->name]);

        return redirect(url()->previous())->with("info_msg","Juego modivo a {$newCategory->name}");
    }
}
