<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Customercontent extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
    public function mines()
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.customercontent');
    }
}
