<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserFollowing extends Component
{
    use WithPagination;

    public User $user;
    public string $search="";

    public function render()
    {
        $followings=[];

        foreach ($this->user->followings as $f){
            if(str_contains($f->username, $this->search)){
                $followings[]=$f;
            }
        }

        return view('livewire.pages.profile.user-following',compact('followings'));
    }

    // public function profile($id){
    //     $user=User::find($id);
    //     $this->emitTo('user-profile','loadUser', $user);
    //     $this->redirect($user->username);
    // }

    public function updatingSearch(){
        $this->resetPage();
    }
}
