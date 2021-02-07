<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Poster extends Component
{
    public $title;
    public $author = [];
    public $body;

    protected $rules = [
        'title' => 'required|max:255',
        'author.name' => 'required',
        'body' => 'required',
    ];

    public function render()
    {
        return view('livewire.poster');
    }

    public function storePostInformation()
    {
        $this->validate();

        // 保存文章信息操作
    }
}
