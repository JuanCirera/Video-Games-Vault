<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserSettings extends Component
{
    use WithFileUploads;

    public User $user;
    public string $username, $email, $password;
    public $img;

    protected $rules=[
        "user.username" => "",
        "user.email" => "",
        "user.password" => "",
        "img" => ""
    ];

    public function render()
    {
        return view('livewire.pages.profile.user-settings');
    }

    public function mount(){
        if(Auth::user()){
            $this->user=Auth::user();
        }
    }

    public function update(){

        $this->user=Auth::user();

        $this->validate([
            "user.username" => ["nullable","string", "unique:users,username,".$this->user->id],
            "user.email" => ["nullable","email","unique:users,email,".$this->user->id],
            "user.password" => ["nullable","string"],
            "img" => ["nullable","image","max:2048"]
        ]);

        if(isset($this->img)){
            $url=$this->img->store("img/avatars");
            $this->user->avatar=$url;
        }

        $this->user->save();

        return redirect(url()->previous())->with("success_msg","Usuario actualizado");
    }
}
