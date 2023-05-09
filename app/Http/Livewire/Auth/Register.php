<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Laravolt\Avatar\Avatar;
use Livewire\Component;

class Register extends Component
{

    public string $username,$email,$password;

    protected $rules=[
        "username" => ['required','max:255','min:2'],
        "email" => ['required','email','max:255','unique:users,email'],
        "password" => ['required','min:6','max:255',"regex:/[a-z]/","regex:/[A-Z]/","regex:/[0-9]/"],
    ];

    public function render()
    {
        session()->forget('resultPage');
        return view('livewire.auth.register');
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
            "username" => $this->username,
            "email" => $this->email,
            "password" => $this->password,
            "avatar" => "https://ui-avatars.com/api/?name=".$this->username."&background=02B3E4&color=fff&bold=true",
            "created_at" => now()
        ])->assignRole("user");

        //INFO: para la imagen de perfil por defecto estoy tirando de la api ui-avatars, la que usa jetstream

        auth()->login($user);

        return redirect('home');
    }
}
