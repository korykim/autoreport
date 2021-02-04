<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\BuyerTable;
use App\Admin\Repositories\BuyerPeople;
use App\Models\Buyer as Administrator;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Carbon;

class BuyerPeopleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new BuyerPeople(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name','买家员工名')->filter(
                Grid\Column\Filter\Like::make()
            );
            $grid->column('email');
            $grid->column('tel');
            $grid->column('hp');
//            $grid->column('wechat');
//            $grid->column('sex');
//            $grid->column('age');
//            $grid->column('fax');


            $grid->column('buyer_id')->display(function($buyerId) {
                return Administrator::find($buyerId)->name;
            })->filter('buyer.id');
            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            })->sortable();

//            $grid->updated_at->display(function ($updated_at) {
//                return Carbon::parse($updated_at)->format('Y-m-d');
//            })->sortable();

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
        return Show::make($id, new BuyerPeople(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('email');
            $show->field('tel');
            $show->field('hp');
            $show->field('wechat');
            $show->field('sex');
            $show->field('age');
            $show->field('fax');
            $show->field('buyer_id');
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
        return Form::make(new BuyerPeople(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->email('email');
            $form->text('tel');
            $form->mobile('hp')->options(['mask' => '999 9999 9999']);
            $form->text('wechat');
            $form->radio('sex')->options(['0' => '女', '1'=> '男'])->default('0');
            $form->text('age');
            $form->text('fax');

            //$form->listbox('aa')->options([1 => 'foo', 2 => 'bar', 'val' => 'Option name']);

            $form->selectTable('buyer_id')
                ->title('弹窗标题')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(BuyerTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(Administrator::class, 'id', 'name'); // 设置编辑数据显示

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
