<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use App\Providers\ApiServiceProvider;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class UserReviews extends Component
{
    public User $user;
    public Review $review;
    public $title,$body,$rating;

    protected $rules=[
        "review.title" => "",
        "review.body" => "",
        "review.rating" => "",
    ];

    public function render()
    {
        $userReviews=Review::where('user_id',$this->user->id)->orderBy('created_at','desc')->get();
        $videogames=Cache::remember('games',86400, function (){
            return ApiServiceProvider::getVideogames();
        });

        return view('livewire.pages.profile.user-reviews',
        [
            "userReviews" => $userReviews,
            "videogames" => $videogames,
            "review" => $this->review
        ]);
    }

    public function mount(){
        $this->review=new Review();
    }

    public function edit(Review $review){
        $this->review=$review;
    }

    public function update(){

        $this->validate([
            "review.title" => ["required","string","min:3"],
            "review.body" => ["required","string","min:10"],
            "review.rating" => ["required","boolean"]
        ]);

        $this->review->save();

        return redirect(url()->previous())->with("success_msg","Reseña actualizada");
    }

    public function destroy(Review $review){

        $review->delete();

        return redirect(url()->previous())->with("info_msg","Reseña eliminada");
    }
}
