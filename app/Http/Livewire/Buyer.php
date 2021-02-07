<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Buyer extends Mainboard
{

    public $content='This is buyer';

    public function render()
    {
        return view('livewire.buyer');
    }

}

