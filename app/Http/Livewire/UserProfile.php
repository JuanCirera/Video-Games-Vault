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
    public User $user;

    protected $listerners = [
        "like" => "like",
        "dislike" => "dislike",
        "user" => "loadUser",
        "render" => "render"
    ];

    public function render()
    {
        session()->forget('resultPage');
        return view('livewire.pages.profile.user-profile', ['user' => $this->user]);
    }


    public function mount(){

        $admin=(Auth::user()->getRoleNames()->toArray()[0])=="admin"?true:false;
        $urlUsername=substr(parse_url(url()->current(), PHP_URL_PATH), 9);

        if($urlUsername=="admin"){
            return redirect('home')->with("error_msg",($admin)?"El administrador no tiene perfil":"¡Vaya! ¿Qué buscabas?");
        }else{
            $this->user=User::where('username',$urlUsername)->first();
        }
    }

}
