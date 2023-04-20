<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserFollowers extends Component
{
    use WithPagination;

    public User $user;
    public string $search="";

    public function render()
    {
        $followers=[];

        foreach ($this->user->followers as $f){
            if(str_contains($f->username, $this->search)){
                $followers[]=$f;
            }
        }

        return view('livewire.pages.profile.user-followers',compact('followers'));
    }

    public function profile($id){
        $user=User::find($id);
        $this->emitTo('user-profile','loadUser', $user);
        $this->redirect($user->username);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

}
