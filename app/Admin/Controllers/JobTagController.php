<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\JobTag;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Carbon;

class JobTagController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new JobTag(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            });

            $grid->updated_at->display(function ($updated_at) {
                return Carbon::parse($updated_at)->format('Y-m-d');
            })->sortable();

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
        return Show::make($id, new JobTag(), function (Show $show) {
            $show->field('id');
            $show->field('name');
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
        return Form::make(new JobTag(), function (Form $form) {
            $form->display('id');
            $form->text('name');

            $form->datetime('created_at');
            $form->datetime('updated_at');
        });
    }
}
