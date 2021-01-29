<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Customer;
use App\Models\User;
use Illuminate\Support\Carbon;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Admin\Renderable\UserTable;
use App\Models\User as Administrator;

class CustomerController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Customer(['tags','customerpeoples']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            //$grid->column('creditcode');
            $grid->column('ceo');
            $grid->column('tel');
            //$grid->column('fax');
            $grid->column('site');
            $grid->column('address');
            $grid->column('tags','标签数')->display(function ($ss){
                $count = count($ss);

                return "<span class='label label-warning' style='color: black'>{$count}</span>";

            });
            $grid->column('customerpeoples','员工数')->display(function ($ss){
                $count = count($ss);

                return "<span class='label label-warning' style='color: black'>{$count}</span>";

            });
//            $grid->column('tag')->display(function ($cid){
//
//
//
//            });
            $grid->column('status','状态')->display(function ($status){
                if ($status==1){
                    return "正常";
                }else{
                    return "关闭";
                }
            });
            $grid->column('Year','更新');

            $grid->column('user_id')->display(function ($userId) {
                return User::find($userId)->name;
            });

            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            });

//            $grid->updated_at->display(function ($updated_at) {
//                return Carbon::parse($updated_at)->format('Y-m-d');
//            });

            //$grid->column('updated_at')->sortable();


//            $grid->customerpeoples('员工数')->display(function ($customerpeoples) {
//                $count = count($customerpeoples);
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
        return Show::make($id, new Customer(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('creditcode');
            $show->field('ceo');
            $show->field('tel');
            $show->field('fax');
            $show->field('site');
            $show->field('address');
            $show->field('status','状态');
            $show->field('Year','更新');
            $show->field('user_id');
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
        return Form::make(new Customer(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('creditcode');
            $form->text('ceo');
            $form->text('tel');
            $form->text('fax');
            $form->text('site');
            $form->text('address');
            //$form->text('user_id');
            $form->switch('status','状态');
            $form->text('Year','更新');

            $form->selectTable('user_id')
                ->title('选择用户')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(UserTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(Administrator::class, 'id', 'name'); // 设置编辑数据显示


            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}