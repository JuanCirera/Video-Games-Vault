<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfile extends Component
{
    // public bool $showOverview=false;
    // public bool $showLibrary=false;
    // public bool $showWishlist=false;
    // public bool $showTracking=false;
    // public bool $showReviews=false;
    // public array $showItems=[
    //     "showOverview" => false,
    //     "showLibrary" => false,
    //     "showWishlist" => false,
    //     "showTracking" => false,
    //     "showReviews" => false,
    // ];

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

    // public function showOverview(){

    //     $this->showOverview=true;
    // }

    // public function showLibrary(){
    //     $this->showLibrary=true;
    // }

    // public function showWishlist(){
    //     $this->showWishlist=true;
    // }

    // public function showTracking(){
    //     $this->showTracking=true;
    // }

    // public function showReviews(){
    //     $this->showReviews=true;
    // }

}
