<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $users=User::all();

        foreach($users as $i=>$u){
            if($u->getRoleNames()->toArray()[0]=="admin"){
                unset($users[$i]);
            }
        }

        return view('livewire.dashboard',compact('users'));
    }
}
