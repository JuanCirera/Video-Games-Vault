<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfile extends Component
{


    public function render()
    {
        $user=auth()->user();
        return view('livewire.pages.user-profile',compact('user'));
    }

    //TODO: modificar esto y hacerlo a mi manera
    public function update(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:2'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'profile_photo_path' => ['image','max:2048'],
        ]);

        // auth()->user()->update([
        //     'username' => $request->get('username'),
        //     'email' => $request->get('email') ,
        //     'profile_photo_path' => $request->get('image')
        // ]);
        return back()->with('succes', 'Profile succesfully updated');
    }


}
