<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use Livewire\Component;

class UserOverview extends Component
{
    public User $user;

    public function render()
    {
        $positiveReviews=Review::where('user_id',$this->user->id)->where('rating',true)->get();
        $negativeReviews=Review::where('user_id',$this->user->id)->where('rating',false)->get();
        
        return view('livewire.user-overview', compact('positiveReviews','negativeReviews'));
    }
}
