<?php

namespace App\Http\Livewire;

use App\Models\MenuList;
use Livewire\Component;

class Contact extends mainboard
{
    public $content='This is contact';

    public function render()
    {

        return view('livewire.contact');
    }
}
