<?php


namespace App\Admin\Controllers;

use App\Admin\Ext\Controllers\MyPage;
use App\Models\User;
use Dcat\Admin\Admin;

use Dcat\Admin\Form;
use Dcat\Admin\Http\Controllers\Dashboard;


use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Tab;
use Dcat\Admin\Widgets\Box;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Http\Request;


class ShowMeController extends AdminController
{

    public function handle(Request $request)
    {
        return $this->response()->success('成功！');
    }

    public function tt(){
        dd('tt');
    }

    public function index(Content $content)
    {
        Admin::style('.icon-list-demo div {
            cursor: pointer;
            line-height: 45px;
            white-space: nowrap;
            color: #75798B;
        }.icon-list-demo i {
            display: inline-block;
            font-size: 18px;
            margin: 0;
            vertical-align: middle;
            width: 40px;
        }');

        return $content
            ->title('ShowMe')
            ->description('This is show me page ')
            ->body(function (Row $row) {
//                $row->column(6, function (Column $column,) {
//                    $column->row(Dashboard::title());
//
//
//                });

                $row->column(12, Card::make(new MyPage()));//"<h1>ss</h1>"

                $forms=Form::make();//->title('表单')->action('showme');


                $row->column(12, $forms);




//                $box=Box::make()
//                    ->title('BOX')
//                    ->content(
//                        Tab::make()
//                            ->add(('Feather'), view('admin::helpers.feather'))
//                    );
//                $row->column(12, $box);



            });
//            ->body(view(
//                'admin::helpers.scaffold',
//                compact('dbTypes', 'action', 'tables', 'dataTypeMap')
//            ));

//        return $content->title('Icon')->body(function (Row $row) {
//            $tab = Tab::make()
//                ->withCard()
//                ->padding('20px')
//                ->add(('Feather'), view('admin::helpers.feather'));
////                ->add(('Font Awesome'), view('admin::helpers.font-awesome'));
//
//            $row->column(12, $tab);
//        });
    }
}
