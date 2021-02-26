<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Form\MatchingTool;
use App\Admin\Ext\Controllers\MyPage;
use Dcat\Admin\Admin;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Box;
use Dcat\Admin\Widgets\Card;

use Dcat\Admin\Widgets\DialogTable;
use Dcat\Admin\Widgets\Dump;
use Dcat\Admin\Widgets\Table;

class ShowPhpInfoController extends AdminController
{
    public function index(Content $content)
    {

        return $content
            ->title('EXTENTION')
            ->body(function (Row $row) {

//                $box2=Box::make()
//                    ->title('PHP INFO')
//                    ->content(new MyPage('1'));
                //$row->column(12, new Card(new MyPage('1')));
                //$row->column(12, new Dump(array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5), "5px"));

//                $user = Admin::user();
//                $box3 = Box::make()
//                    ->title('TABLE')
//                    ->content(Table::make(array('title' => 'title', 'content' => 'content'), $user->toArray(), 'table table-bordered table-striped table-hover table-responsive'));
//
//                $row->column(12, $box3);

                $box4 = Box::make()
                    ->title('匹配')
                    ->content(MatchingTool::make());

                $row->column(12, $box4);

//                $row->column(12, DialogTable::make()
//                    ->title("title"));

            });
    }

    public function edit($id, Content $content)
    {

    }
}
