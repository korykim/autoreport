<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\BuyerMachingManager;


use App\Admin\Actions\Grid\GetIDS;
use App\Admin\Extensions\Tools\ReleasePost;
use App\Admin\Repositories\WorkPlan;
use App\Models\Buyer as BuyerAdministrator;
use App\Models\Customer as CustomerAdministrator;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Carbon;

class WorkPlanController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WorkPlan(), function (Grid $grid) {
            //$grid->model()->with(['buyer','customer']);

            //$grid->quickSearch('buyer_id','personal_name');
            $grid->fixColumns(2, -2);
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('jobId');
            $grid->column('customer_id')->display(function ($customer_id) {
                return CustomerAdministrator::find($customer_id)->name;
            })->filterByValue('customer.id');
            $grid->column('buyer_id')->display(function ($buyer_id) {
                return BuyerAdministrator::find($buyer_id)->name;
            })->filterByValue('buyer.id');
            $grid->column('personal_name');
            $grid->column('total_Personal')->sortable();
            $grid->column('email')->copyable();
            $grid->column('tel1')->copyable();
            $grid->column('tel2')->copyable();
            $grid->column('site')->copyable();
            //$grid->column('created_at');
            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            })->sortable()->filter(
                Grid\Column\Filter\Gt::make()->datetime('YYYY-MM-DD')
            );
            //$grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');


            });

            $grid->tools(function (Grid\Tools $tools) {

                $tools->append(new BuyerMachingManager());

                //获取复选框选中的 ID 数组
                $tools->append(new GetIDS("获取选取ID"));


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
        return Show::make($id, new WorkPlan(), function (Show $show) {
            $show->field('id');
            $show->field('jobId');
            $show->field('customer_id');
            $show->field('buyer_id');
            $show->field('personal_name');
            $show->field('total_Personal');
            $show->field('email');
            $show->field('tel1');
            $show->field('tel2');
            $show->field('site');
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
        return Form::make(new WorkPlan(), function (Form $form) {
            $form->display('id');
            $form->text('jobId');
            $form->text('customer_id');
            $form->text('buyer_id');
            $form->text('personal_name');
            $form->text('total_Personal');
            $form->text('email');
            $form->text('tel1');
            $form->text('tel2');
            $form->text('site');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
