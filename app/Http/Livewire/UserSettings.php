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
        // "avatar" => ""
    ];

    public function render()
    {
        return view('livewire.pages.profile.user-settings');
    }

    public function mount(){
        $this->user=Auth::user();
    }

    public function update(){
        $this->validate([
            // "user.username" => ["required","string", "unique:users,username,".$this->user->id],
            // "user.email" => ["required","email","unique:users,email,".$this->user->id],
            // "user.password" => ["required","string","unique:users,password"],
            "img" => ["required","image","max:2048"]
        ]);

        // $this->user->save();
        $url=$this->img->store("img/avatars");
        // dd($this->img->store());
        $this->user->update([
            "avatar" => $url
        ]);

        return redirect("/".$this->user->username."/settings")->with("success_msg","Usuario actualizado");
    }
}
