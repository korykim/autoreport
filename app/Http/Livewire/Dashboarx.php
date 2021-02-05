<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\MenuList;

class Dashboarx extends Component
{

    public function render()
    {

        $menuList=MenuList::all();

        return view('livewire.dashboard', ['Content' => "one", 'menuList' => $menuList]);
    }
}
