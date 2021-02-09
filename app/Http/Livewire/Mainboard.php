<?php

namespace App\Http\Livewire;

use App\Models\MenuList;
use Livewire\Component;

class Mainboard extends Component
{
    public $menuList;
    public $content='This is mainboard';
    public $username;
    public $userprofile='';


    public function mount()
    {
        $this->menuList =MenuList::all();
        $this->username=auth()->user()->name;
        $this->userprofile=auth()->user()->profile_photo_url;

    }
    public function render()
    {
        return view('livewire.mainboard'); //,compact('content')
    }
}
