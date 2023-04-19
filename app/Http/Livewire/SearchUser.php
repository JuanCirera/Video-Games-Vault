<?php

namespace App\Http\Livewire;

use App\Models\User;
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

        return view('livewire.pages.search-user',compact('users'));
    }

    public function mount(){
        $this->user=new User();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function profile($id){
        $user=User::find($id);
        $this->emitTo('user-profile','loadUser', $user);
        $this->redirect($user->username);
    }
}
