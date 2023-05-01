<?php

namespace App\Http\Livewire;

use App\Mail\NotifyUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class UserFollow extends Component
{

    public bool $following=false;
    public int $user_id;

    public function render()
    {
        return view('livewire.pages.profile.user-follow');
    }

    public function mount(){
        $this->following=Auth::user()->followings->contains($this->user_id);
    }

    public function follow(){

        $mailContent=
        '<div>
        <p style="margin-top: 5vh; text-align: center; font-size: 1.5vh">'
        .Auth::user()->username.' te ha seguido
        </p>
        </div>';

        if($this->following){
            Auth::user()->followings()->detach($this->user_id);
        }else{
            Auth::user()->followings()->attach($this->user_id);

            if(User::find($this->user_id)->notifySocial){
                Mail::to(User::find($this->user_id)->email)->send(new NotifyUser([
                    "content" => $mailContent
                ]));
            }
        }

        $this->following=!$this->following;
    }
}
