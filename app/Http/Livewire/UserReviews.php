<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use App\Providers\ApiServiceProvider;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class UserReviews extends Component
{
    public User $user;

    public function render()
    {
        $userReviews=Review::where('user_id',$this->user->id)->orderBy('created_at','desc')->get();
        $videogames=Cache::remember('games',86400, function (){
            return ApiServiceProvider::getVideogames();
        });

        return view('livewire.pages.profile.user-reviews',compact('userReviews', 'videogames'));
    }
}
