<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use Livewire\Component;

class UserReviews extends Component
{
    public User $user;

    public function render()
    {
        $userReviews=Review::where('user_id',$this->user->id)->orderBy('created_at','desc')->get();

        return view('livewire.pages.profile.user-reviews',compact('userReviews'));
    }
}
