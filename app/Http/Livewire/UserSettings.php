<?php

namespace App\Http\Livewire;

use App\Mail\NotifyUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserSettings extends Component
{
    use WithFileUploads;

    public User $user;
    public string $password;
    public $img;

    protected $rules=[
        "user.username" => "",
        "user.email" => "",
        "password" => "",
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

        $this->validate([
            "user.username" => ["nullable","string","unique:users,username,".$this->user->id],
            "user.email" => ["nullable","email","unique:users,email,".$this->user->id],
            "password" => ["nullable","string","min:6","regex:/[a-z]/","regex:/[A-Z]/","regex:/[0-9]/"],
            "img" => ["nullable","image","max:2048"]
        ]);

        if(isset($this->img)){
            $url=$this->img->store("img/avatars");
            $this->user->avatar=$url;
        }

        if(isset($this->password)){
            $this->user->password=$this->password;
        }

        $this->user->update();

        return redirect(url()->previous())->with("info_msg","Usuario actualizado");

    }

    // public function send(){
    //     Mail::to($this->user->email)->send(new NotifyUser(["hola"]));
    // }
}
