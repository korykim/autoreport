<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\BuyerPeopleTable;
use App\Admin\Renderable\BuyerTable;
use App\Admin\Renderable\CustomerTable;
use App\Admin\Renderable\UserTable;
use App\Admin\Repositories\Contact;
use App\Models\Buyer;
use App\Models\Buyer as BuyerAdministrator;
use App\Models\BuyerPeople as BuyerPeopleAdministrator;
use App\Models\BuyerPeople as BuyerPeopleTableAdministrator;
use App\Models\Customer as CustomerAdministrator;
use App\Models\JobTag;
use App\Models\tag;
use App\Models\User;
use App\Models\Customer;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Carbon;

class ContactController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Contact(), function (Grid $grid) {
//            $grid->export();
//            $grid->export()->disableExportCurrentPage()->rows(function (array $rows) {
//                foreach ($rows as $index => &$row) {
//                    $row['title'] = $row['title'].' '.$row['last_name'];
//                }
//
//                return $rows;
//            });


            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('customer_id')->display(function ($customer_id) {
                return CustomerAdministrator::find($customer_id)->name;
            });
            $grid->column('buyer_id')->display(function ($buyer_id) {
                return BuyerAdministrator::find($buyer_id)->name;
            });
            $grid->column('to')->display(function ($buyerpeople_id) {
                return BuyerPeopleAdministrator::find($buyerpeople_id)->name;
            });

            //$grid->column('content');

            $grid->column('options')->display(function ($options) {
                $directors = [
                    1 => 'Email',
                    2 => 'Tel',
                    3 => 'Zoom',
                    4 => 'Visit',
                ];

                return $directors[$options];


            });

            $grid->column('tag','状态')->display(function ($tag) {
                $jobtags = [
                    1 => '开发',
                    2 => '接触',
                    3 => '跟进',
                    4 => '结果',
                    5 => '废弃',
                ];
                return $jobtags[$tag];
            });
//            $grid->column('tag')->display(function ($tagId) {
//                //return JobTag::find($tagId[0])->name;
//                dd($tagId);
//            });


            $grid->column('totime')->display(function ($totime) {
                return Carbon::parse($totime)->format('Y-m-d');
            });

            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            });

//            $grid->updated_at->display(function ($updated_at) {
//                return Carbon::parse($updated_at)->format('Y-m-d');
//            })->sortable();


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
        return Show::make($id, new Contact(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('customer_id');
            $show->field('buyer_id');
            $show->field('to');
            $show->field('content');
            $show->field('options');
            $show->field('tag','状态');
            $show->field('totime');
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


        return Form::make(new Contact(), function (Form $form) {



            $form->display('id');
            $form->text('title');

            $form->selectTable('customer_id')
                ->title('选择用户')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(CustomerTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(CustomerAdministrator::class, 'id', 'name'); // 设置编辑数据显示

            $form->selectTable('buyer_id')
                ->title('选择用户')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(BuyerTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(BuyerAdministrator::class, 'id', 'name'); // 设置编辑数据显示
            //$form->text('to');
            $form->selectTable('to')
                ->title('选择用户')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(BuyerPeopleTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(BuyerPeopleTableAdministrator::class, 'id', 'name'); // 设置编辑数据显示
            $form->editor('content')->imageDirectory("editor/images");

            $directors = [
                1 => 'Email',
                2 => 'Tel',
                3 => 'Zoom',
                4 => 'Visit',
            ];

            $form->select('options','联系方法')->options($directors);

            $jobtags = [
                1 => '开发',
                2 => '接触',
                3 => '跟进',
                4 => '结果',
                5 => '废弃',
            ];

            $form->select('tag','状态')->options($jobtags);

//            $form->tags('tag', '标签')
//                ->pluck('name', 'id') // name 为需要显示的 Tag 模型的字段，id 为主键
//                ->options(JobTag::all()); // 下拉框选项
//                ->saving(function ($value) {
//                    return $value;
//                });


//            $form->multipleSelect('tags')
//                ->options(Tag::all()->pluck('name', 'id'))
//                ->customFormat(function ($v) {
//                    if (! $v) {
//                        return [];
//                    }
//
//                    // 从数据库中查出的二维数组中转化成ID
//                    return array_column($v, 'id');
//                });


            $form->datetime('totime');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
