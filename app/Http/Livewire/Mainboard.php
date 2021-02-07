<?php

namespace App\Http\Livewire;

use App\Models\MenuList;
use Livewire\Component;

class Mainboard extends Component
{
    public $menuList;
    public $content='This is mainboard';
    public $username;


    public function mount()
    {
        $this->menuList =MenuList::all();
        $this->username=auth()->user()->name;

    }
    public function render()
    {
        return view('livewire.mainboard'); //,compact('content')
    }
}
