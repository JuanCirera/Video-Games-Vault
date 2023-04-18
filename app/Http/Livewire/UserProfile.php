<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use App\Models\Videogame;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserProfile extends Component
{

    public $gameCategory;

    protected $listerners=[
        "like" => "like",
        "dislike" => "dislike"
    ];

    public function render()
    {
        $user=User::find(Auth::user()->id);
        // $finishedGames=Videogame::where('user_id',$user->id);
        // dd($finishedGames);
        return view('livewire.pages.user-profile',
        compact('user'));
    }

    //TODO: modificar esto y hacerlo bien
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


    public function like(Review $review){
        dd("HOLA");//TODO
        $review->likes+=1;
        $review->save();
    }

    public function dislike(Review $review){
        $review->dislikes+=1;
        $review->save();
    }

}
