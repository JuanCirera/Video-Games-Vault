<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserFollowing extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.pages.profile.user-following');
    }

    public function profile($id){
        // return redirect("@".$user->username);
        $user=User::find($id);
        $this->emitTo('user-profile','loadUser', $user);
        $this->redirect($user->username);
    }
}
