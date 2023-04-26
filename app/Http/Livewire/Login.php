<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Login extends Component
{
    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials=$request->only('email','password');

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            Log::info("User ".Auth::user()->username." logged in from ".$request->ip());
            return redirect((Auth::user()->username=="admin")?'/admin/dashboard':'home');
        }

        Log::info("Login attempt from ".$request->ip());
        return back()->withErrors([
            'email' => 'Las credenciales introducidas no coinciden con ningún registro',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
