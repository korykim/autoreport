<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Taggable;

use App\Models\tag;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Contact;
use App\Models\Customer;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Carbon;
use Str;

class TaggableController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        return Grid::make(new Taggable(), function (Grid $grid) {



            $grid->column('id')->sortable();

            $grid->column('tag_id')->display(function ($tagId) {
                return Tag::find($tagId)->name;
            });
            $grid->column('taggable_type');



            $grid->column('taggable_id')->display(function ($tid){
                $model=Str::afterLast($this->taggable_type,'\\');
                if($model=='Buyer'){
                    return Buyer::where('id', '=',$tid)->firstOrFail()->name;
                }else if($model=='Customer'){
                    return Customer::where('id', '=',$tid)->firstOrFail()->name;
                }else if($model=='Contact'){
                    return Contact::where('id', '=',$tid)->firstOrFail()->name;
                }


            });
            //->display(function ($tid){
            //                $customer=Customer::where('id', '=',1)->firstOrFail();
            //
            //                return $customer->name;
            //            });

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
        return Show::make($id, new Taggable(), function (Show $show) {
            $show->field('id');
            $show->field('tag_id');
            $show->field('taggable_type');
            $show->field('taggable_id');
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
        return Form::make(new Taggable(), function (Form $form) {
            $form->display('id');
            $form->text('tag_id');
            $form->text('taggable_type');
            $form->text('taggable_id');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
