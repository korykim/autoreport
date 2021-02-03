<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\CategoryTable;
use App\Admin\Renderable\TagTable;
use App\Admin\Repositories\Customer;
use App\Models\tag as tagAdministrator;
use App\Models\Category as CategoryAdministrator;
use App\Models\User;
use App\Models\User as Administrator;
use Dcat\Admin\Admin;
use Illuminate\Support\Carbon;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Admin\Renderable\UserTable;


class CustomerController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Customer(['tags', 'customerpeoples']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            //$grid->column('creditcode');
            $grid->column('ceo');
            $grid->column('tel');
            //$grid->column('fax');
            $grid->column('site');
            $grid->column('category', '类目')->display(function ($tt) {
                return CategoryAdministrator::find($tt)->name;

            })->badge();
            //$grid->column('address')->limit(5, '...');
//            $grid->column('tags','标签数')->display(function ($ss){
//                $count = count($ss);
//
//                return "<span class='label label-warning' style='color: black'>{$count}</span>";
//
//            });
            $grid->column('customerpeoples', '员工数')->display(function ($ss) {
                $count = count($ss);

                return "<span class='label label-warning' style='color: black'>{$count}</span>";

            });
//            $grid->column('tag')->display(function ($cid){
//
//
//
//            });
            $grid->column('status')
                ->using([0 => '关闭', 1 => '正常'])
                ->dot(
                    [
                        0 => 'danger',
                        1 => Admin::color()->info(),
                        2 => 'primary',
                        3 => 'success',

                    ],
                    'primary' // 第二个参数为默认值
                )->sortable();
            $grid->column('Year')->sortable();
            $grid->column('start')->sortable();
            $grid->column('end')->sortable();

            $grid->column('tags','标签')->display(function ($dd){
                return $dd->pluck('name');
            })->badge();

            $grid->column('user_id', '主人')->display(function ($userId) {
                return User::find($userId)->name;
            });


            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            })->sortable();

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
            $show->field('status');
            $show->field('Year');
            $show->field('start');
            $show->field('end');
            $show->field('tags', '标签');

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
        return Form::make(new Customer('tags'), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->text('creditcode');
            $form->text('ceo');
            $form->text('tel');
            $form->text('fax');
            $form->url('site');
            $form->text('address');
            //$form->text('user_id');
            $form->switch('status');
            $form->number('Year')->min(0);
            $form->date('start');
            $form->date('end');
            //$form->dateRange($form->start, $form->end, '合同时间');

            $form->selectTable('user_id')
                ->required()
                ->title('选择用户')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(UserTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(Administrator::class, 'id', 'name'); // 设置编辑数据显示


            $form->selectTable('category')
                ->default('1', true)
                ->title('选择类目')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(CategoryTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(CategoryAdministrator::class, 'id', 'name'); // 设置编辑数据显示

//            $form->hasMany('tags', function (Form\NestedForm $form) {
//                $form->text('name',"标签名");
//
//            });



//            $form->multipleSelectTable('tags','标签')
//                ->title('选择标签')
//                ->dialogWidth('50%')
//                ->from(TagTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
//                ->model(tagAdministrator::class, 'id', 'name'); // 设置编辑数据显示


            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
