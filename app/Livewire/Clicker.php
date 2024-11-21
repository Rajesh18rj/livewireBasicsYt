<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Clicker extends Component
{
    public $username = 'testuser';
    
    public function createNewUser(){
        User::create([
            'name' => 'test user2',
            'email' => 'test@test2.com',
            'password'=> '123456789'
        ]);
    }

    public function render()
    {
        $title="Test";
        $users= User::all();

        return view('livewire.clicker',[
            'title'=> $title,
            'users'=>$users
        ]);
    }
}
