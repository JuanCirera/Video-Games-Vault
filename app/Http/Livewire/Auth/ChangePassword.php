<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ChangePassword extends Component
{
    protected $user;

    public function render()
    {
        return view('livewire.auth.change-password');
    }

    public function mount(){
        Auth::logout();

        $id = intval(request()->id);
        $this->user = User::find($id);
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required', 'min:5'],
            'confirm-password' => ['same:password']
        ]);

        $userExists = User::where('email', $request->email)->first();

        if ($userExists) {
            $userExists->update([
                'password' => $request->password
            ]);

            Log::info("Password reset for user $userExists from ".$request->ip());

            return redirect('login')->with("success_msg","Contraseña cambiada correctamente");
        } else {
            return back()->with('error_msg', 'El email no corresponde con el usuario');
        }
    }
}
