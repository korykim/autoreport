<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\BuyerTable;
use App\Admin\Renderable\CustomerTable;
use App\Admin\Repositories\CustomerPeople;
use App\Models\Customer as Administrator;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Carbon;

class CustomerPeopleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new CustomerPeople(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name')->filter(
                Grid\Column\Filter\Like::make()
            );
            $grid->column('email');
            $grid->column('tel');
            $grid->column('hp');
//            $grid->column('wechat');
//            $grid->column('sex');
//            $grid->column('age');
//            $grid->column('fax');

            $grid->column('customer_id')->display(function($customerId) {
                return Administrator::find($customerId)->name;
            })->filter('customer.id');
            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            })->sortable();

            $grid->updated_at->display(function ($updated_at) {
                return Carbon::parse($updated_at)->format('Y-m-d');
            })->sortable();
//            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('name');

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
        return Show::make($id, new CustomerPeople(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('email');
            $show->field('tel');
            $show->field('hp');
            $show->field('wechat');
            $show->field('sex');
            $show->field('age');
            $show->field('fax');
            $show->field('customer_id');
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
        return Form::make(new CustomerPeople(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->email('email');
            $form->text('tel');
            $form->mobile('hp')->options(['mask' => '999 9999 9999']);
            $form->text('wechat');
            $form->radio('sex')->options(['0' => '女', '1'=> '男'])->default('0');
            $form->text('age');
            $form->text('fax');
            //$form->text('customer_id');

            $form->selectTable('customer_id')
                ->title('员工')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(CustomerTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(\App\Models\Customer::class, 'id', 'name'); // 设置编辑数据显示

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
