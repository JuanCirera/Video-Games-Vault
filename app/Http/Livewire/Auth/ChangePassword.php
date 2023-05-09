<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ChangePassword extends Component
{
    public function render()
    {
        Auth::logout();

        $user_id = intval(request()->id);

        return view('livewire.auth.change-password',compact('user_id'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required', 'min:6','max:255',"regex:/[a-z]/","regex:/[A-Z]/","regex:/[0-9]/"],
            'confirm-password' => ['same:password'],
            'u_id' => ['required','numeric','exists:users,id']
        ]);

        $user = User::find($request->u_id);

        $userExists = User::where('email', $request->email)->first();

        if ($userExists && $user->email==$userExists->email) {
            $userExists->update([
                'password' => $request->password
            ]);

            Log::info("Password reset for user $userExists from ".$request->ip());

            return redirect('login')->with("success_msg","Contraseña cambiada correctamente");
        } else {

            Log::info("Password reset attempt for user $userExists->username from ".$request->ip());

            return redirect(url()->previous())->with('error_msg', 'El email no corresponde con el usuario que solicitó el cambio');
        }
    }
}
