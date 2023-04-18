<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserFollow extends Component
{

    public bool $following=false;
    public int $user_id;

    public function render()
    {
        return view('livewire.pages.profile.user-follow');
    }

    public function mount(){
        $this->following=Auth::user()->followings->contains($this->user_id);
    }

    public function follow(){
        if($this->following){
            Auth::user()->followings()->detach($this->user_id);
        }else{
            Auth::user()->followings()->attach($this->user_id);
        }

        $this->following=!$this->following;
    }
}
