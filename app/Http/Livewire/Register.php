<?php

namespace App\Http\Livewire;

use App\Models\User;
use Laravolt\Avatar\Avatar;
use Livewire\Component;

class Register extends Component
{

    public string $username,$email,$password;

    protected $rules=[
        "username" => ['required','max:255','min:2'],
        "email" => ['required','email','max:255','unique:users,email'],
        "password" => ['required','min:5','max:255'],
    ];

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
            "username" => $this->username,
            "email" => $this->email,
            "password" => $this->password,
            "profile_photo_path" => "https://ui-avatars.com/api/?name=".$this->username."&background=8392ab&color=fff&bold=true"
        ]);

        //NOTE: para la imagen de perfil por defecto estoy tirando de la api ui-avatars, la que usa jetstream

        auth()->login($user);

        return redirect('home');
    }
}