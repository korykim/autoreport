<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Customer extends Mainboard
{
    public $content='This is customer';
    public function render()
    {
        return view('livewire.customer');
    }
}
