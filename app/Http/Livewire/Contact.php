<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Notifications\ContactNotify;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contact extends Component
{
    public string $email, $content;
    protected $rules=[
        "email" => "",
        "content" => ""
    ];

    public function render()
    {
        session()->forget('resultPage');
        return view('livewire.pages.contact.contact');
    }

    public function send(){

        if(Auth::user()){
            $this->email=Auth::user()->email;
        }

        $this->validate([
            "email" => ["required","email"],
            "content" => ["required","string","min:6"]
        ]);

        if(Auth::user()){
            User::find(1)->notify(new ContactNotify($this->email,$this->content));
        }else{
            User::find(1)->notify(new ContactNotify($this->email,$this->content));
        }

        return redirect(url()->previous())->with('success_msg',"Mensaje enviado");
    }
}
