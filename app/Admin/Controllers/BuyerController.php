<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Buyer;
use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Carbon;
use App\Admin\Renderable\UserTable;
use App\Models\User as Administrator;

class BuyerController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Buyer(['tags','buyerpeoples']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            //$grid->column('creditcode');
            $grid->column('ceo');
            $grid->column('tel');
            //$grid->column('fax');
            $grid->column('site');
            $grid->column('address');
            $grid->column('user_id')->display(function ($userId) {
                return User::find($userId)->name;
            });

            $grid->column('tags','标签数')->display(function ($ss){
                $count = count($ss);

                return "<span class='label label-warning' style='color: black'>{$count}</span>";

            });
            $grid->column('buyerpeoples','员工数')->display(function ($ss){
                $count = count($ss);

                return "<span class='label label-warning' style='color: black'>{$count}</span>";

            });

            $grid->column('status');

            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            });


//            $grid->updated_at->display(function ($updated_at) {
//                return Carbon::parse($updated_at)->format('Y-m-d');
//            })->sortable();

//            $grid->buyerpeoples('员工数')->display(function ($buyerpeoples) {
//                $count = count($comments);
//
//                return "<span class='label label-warning'>{$count}</span>";
//            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Buyer(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('creditcode');
            $show->field('ceo');
            $show->field('tel');
            $show->field('fax');
            $show->field('site');
            $show->field('address');
            $show->field('user_id');
            $show->field('status');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Buyer(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('creditcode');
            $form->text('ceo');
            $form->text('tel');
            $form->text('fax');
            $form->text('site');
            $form->text('address');
            $form->text('status');
            $form->text('user_id');
            $form->selectTable('user_id')
                ->title('选择用户')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(UserTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(Administrator::class, 'id', 'name'); // 设置编辑数据显示


            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
