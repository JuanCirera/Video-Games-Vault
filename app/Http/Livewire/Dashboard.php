<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class Dashboard extends Component
{
    public User $user;
    public string $password, $repeat_password;

    protected $rules=[
        "user.username" => "",
        "password" => "",
        "repeat_password" => ""
    ];

    public function render()
    {
        session()->forget('resultPage');

        $users=User::all();

        foreach($users as $i=>$u){

            $roles=$u->getRoleNames()->toArray();
            // reset coge devuelve el primer elemento del array, no lo borra
            if(reset($roles) == "admin"){
                unset($users[$i]);
            }
        }

        return view('livewire.pages.admin.dashboard',compact('users'));
    }

    public function editUser(User $user){
        $this->user=$user;
    }

    public function updateUser(){
        $this->validate([
            "user.username" => ["nullable","string","min:1"],
            "password" => ["nullable","string","min:6","regex:/[a-z]/","regex:/[A-Z]/","regex:/[0-9]/"],
            "repeat_password" => ["nullable","same:password"]
        ]);

        if(isset($this->password)){
            $this->user->password=$this->password;
        }

        $this->user->update();

        return redirect(url()->previous())->with('success_msg',"Usuario actualizado");

    }


    public function destroyUser(User $user){
        if (!(Str::contains($user->avatar, 'ui-avatars') || Str::contains($user->avatar, 'lh3.googleusercontent') || Str::contains($user->avatar, 'graph.facebook'))){
            Storage::delete($user->avatar);
        }
        $username=$user->username;

        $user->delete();

        return redirect(url()->previous())->with('info_msg',"Usuario $username eliminado");
    }
}
