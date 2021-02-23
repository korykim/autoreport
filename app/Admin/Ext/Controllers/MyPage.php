<?php

namespace App\Admin\Ext\Controllers;

use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Contracts\Support\Renderable;
use View;


class MyPage implements Renderable
{

    // 定义页面所需的静态资源，这里会按需加载
//    public static $js = [
//        '//cdnjs.cloudflare.com/ajax/libs/json3/3.3.2/json3.min.js',
//        '/js/parser.js',
//        '/js/MultipleSelect/multiple-select.js',
//        '/js/My97DatePicker/WdatePicker.js',
//
//    ];
//    public static $css = [
//        '/js/MultipleSelect/multiple-select.css',
//        '/css/checkbox-style.css',
//    ];

    private $id;

    //从控制器接受$id变量
    public function __construct($id)
    {
        $this->id = $id;
    }

    public $btnname = 'refresh';
    public $btnname2 = 'test';
    public $attributes = 'text';
    public $label = 'me';
    public $showCloseBtn = true;

    public function script()
    {
        return <<<JS
        console.log('所有JS脚本都加载完了');

        JS;
    }


    public function render()
    {
        return admin_view('admin::pages.my-page',[
            'btnname'=>$this->btnname,
            'btnname2'=>$this->btnname2,
            'attributes'=>$this->attributes,
            'label'=>$this->label,
            'urls'=>'tt'
        ]);

        //return view('admin.checks.edit', compact('checks', 'cats', 'groups', 'products','checkArr'));


        //View::addNamespace('test', __DIR__.'/../views');

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

