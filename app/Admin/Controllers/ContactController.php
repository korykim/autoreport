<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\BuyerPeopleTable;
use App\Admin\Renderable\BuyerTable;
use App\Admin\Renderable\CustomerTable;
use App\Admin\Renderable\JobTagTable;
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
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Widgets\Lazy;
use Illuminate\Support\Carbon;
use Dcat\Admin\Layout\Content;


class ContactController extends AdminController
{


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        //setcookie("cookie1","", time()+60);

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
            $grid->column('title')->filter(Grid\Column\Filter\Like::make());
            $grid->column('customer_id')->display(function ($customer_id) {
                return CustomerAdministrator::find($customer_id)->name;
            })->filter('customer.id');
            $grid->column('buyer_id')->display(function ($buyer_id) {
                return BuyerAdministrator::find($buyer_id)->name;
            })->filter('buyer.id');
            $grid->column('to')->display(function ($buyerpeople_id) {
                return BuyerPeopleAdministrator::find($buyerpeople_id)->name;
            })->filter('to');

            //$grid->column('content');

            $grid->column('options')->display(function ($options) {
                $directors = [
                    1 => '邮件',
                    2 => '电话',
                    3 => '线上(Zoom,Wechat)',
                    4 => '拜访',
                ];

                return $directors[$options];


            })->filter('options');

            $grid->column('tag','状态')->display(function ($tag) { //JobTag
                return JobTag::find($tag)->name;
            })->badge('info')->filter(
                Grid\Column\Filter\In::make([
                    1 => '开发',
                    2 => '接触',
                    3 => '跟进',
                    4 => '结果',
                    5 => '废弃',
                ])
            );



            $grid->column('tags','标签')->display(function ($dd){
                return $dd->pluck('name');
            })->badge('danger');

            $grid->column('totime')->display(function ($totime) {
                return Carbon::parse($totime)->format('Y-m-d');
            })->filter(
                Grid\Column\Filter\Gt::make()->datetime('YYYY-MM-DD')
            );

            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            })->sortable();

//            $grid->updated_at->display(function ($updated_at) {
//                return Carbon::parse($updated_at)->format('Y-m-d');
//            })->sortable();


            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('title');

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
            $form->text('title')->required();

            $form->selectTable('customer_id')
                ->required()
                ->placeholder('选择客户')
                ->title('选择用户')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(CustomerTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(CustomerAdministrator::class, 'id', 'name'); // 设置编辑数据显示



            $form->selectTable('buyer_id')
                ->required()
                ->title('选择用户')
                ->placeholder('选择买家')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(BuyerTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(BuyerAdministrator::class, 'id', 'name');// 设置编辑数据显示



//            $form->editing(function (Form $form) {
//                // 判断是否是新增操作
//            });

            //$form->select('to')->options(Buyer::all()->pluck('name', 'id'));


            $form->selectTable('to')
                ->required()
                ->placeholder('选择买家联系人')
                ->title('选择用户')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(BuyerPeopleTable::make()) // 设置渲染类实例，并传递自定义参数  ->payload(['io' =>'1'])
                ->model(BuyerPeopleTableAdministrator::class, 'id', 'name'); // 设置编辑数据显示



            $form->editor('content')->imageDirectory("editor/images");

            $directors = [
                1 => '邮件',
                2 => '电话',
                3 => '线上(Zoom,Wechat)',
                4 => '拜访',
            ];

            $form->select('options','联系方法')->options($directors)->required();


            //$form->select('tag','状态')->options($jobtags);
            $form->selectTable('tag','状态')
                ->required()
                ->placeholder('选择状态')
                ->title('选择工作状态')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(JobTagTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(JobTag::class, 'id', 'name'); // 设置编辑数据显示


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


            $form->datetime('totime')->required();

            //$form->map("39.56","116.20","坐标");
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
