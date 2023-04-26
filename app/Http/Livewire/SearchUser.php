<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUser extends Component
{
    use WithPagination;

    public User $user;
    public string $search="";

    public function render()
    {
        $users=User::where('username','LIKE','%'.$this->search.'%')->get();

        //Con esto evito que se mande el usuario admin con el resto hacia la vista
        foreach($users as $i=>$u){
            if($u->getRoleNames()->toArray()[0]=="admin"){
                unset($users[$i]);
            }
        }

        return view('livewire.pages.search-user',compact('users'));
    }

    public function mount(){
        $this->user=(Auth::user())?Auth::user():new User();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    // public function profile($id){
    //     $user=User::find($id);
    //     $this->emitTo('user-profile','loadUser', $user);
    //     $this->redirect($user->username);
    // }
}
