<?php

namespace App\Admin\Ext\Controllers;

use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Contracts\Support\Renderable;


class MyPage implements Renderable
{
    public $btnname = 'refresh';
    public $btnname2 = 'test';
    public $attributes = 'text';
    public $label = 'me';
    public $showCloseBtn = true;



    public function render()
    {
        return admin_view('admin::pages.my-page',[
            'btnname'=>$this->btnname,
            'btnname2'=>$this->btnname2,
            'attributes'=>$this->attributes,
            'label'=>$this->label,
            'urls'=>'tt'
        ]);

//        return admin_view('admin::widgets.alert',[
//            'title'=>'title',
//            'content'=>'content',
//            'attributes'=>$this->attributes,
//            'showCloseBtn'=>$this->showCloseBtn,
//            'icon '=>'info',
//
//        ]);
    }


}

