<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Notifications\ForgotPassword;
use Illuminate\Http\Request;

class ResetPassword extends Component
{
    public string $email;

    protected $rules=[
        "email" => ['required','email']
    ];

    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function routeNotificationForMail() {
        return request()->email;
    }

    public function send()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if ($user) {
            $user->notify(new ForgotPassword($user->id));
            return redirect(url()->previous())->with('success_msg', 'El correo se ha enviado exitosamente');
        }
    }
}
