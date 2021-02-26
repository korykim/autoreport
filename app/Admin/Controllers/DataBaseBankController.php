<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\DataBaseBank;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class DataBaseBankController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new DataBaseBank(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('companyname','公司名');
            //$grid->column('ostatus');
            //$grid->column('creditcode');
            //$grid->column('province');
            $grid->column('city','城市');
            //$grid->column('district');
            $grid->column('owner','法人');
            $grid->column('capital','注册资本');
            //$grid->column('startdate');
            //$grid->column('oldname');
            $grid->column('industry','行业');
            //$grid->column('type');
            $grid->column('personal','社保人数');
            //$grid->column('scope');
            //$grid->column('address');

            $grid->column('email','邮箱');

            $grid->column('site','网站')->limit(25, '...');
            //$grid->column('tel1');
           //$grid->column('tel2');

            //$grid->column('created_at');
            //$grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('companyname','公司名');
                $filter->like('site','网站');
                $filter->like('industry','行业');

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
        return Show::make($id, new DataBaseBank(), function (Show $show) {
            $show->field('id');
            $show->field('companyname');
            $show->field('ostatus');
            $show->field('creditcode');
            $show->field('province');
            $show->field('city');
            $show->field('district');
            $show->field('owner');
            $show->field('capital');
            $show->field('startdate');
            $show->field('oldname');
            $show->field('industry');
            $show->field('type');
            $show->field('personal');
            $show->field('scope');
            $show->field('address');
            $show->field('addresscheck');
            $show->field('email');
            $show->field('emailcheck');
            $show->field('site');
            $show->field('tel1');
            $show->field('tel2');
            $show->field('tel3');
            $show->field('tel4');
            $show->field('tel5');
            $show->field('tel6');
            $show->field('tel7');
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
        return Form::make(new DataBaseBank(), function (Form $form) {
            $form->display('id');
            $form->text('companyname');
            $form->text('ostatus');
            $form->text('creditcode');
            $form->text('province');
            $form->text('city');
            $form->text('district');
            $form->text('owner');
            $form->text('capital');
            $form->text('startdate');
            $form->text('oldname');
            $form->text('industry');
            $form->text('type');
            $form->text('personal');
            $form->text('scope');
            $form->text('address');
            $form->text('addresscheck');
            $form->text('email');
            $form->text('emailcheck');
            $form->text('site');
            $form->text('tel1');
            $form->text('tel2');
            $form->text('tel3');
            $form->text('tel4');
            $form->text('tel5');
            $form->text('tel6');
            $form->text('tel7');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
