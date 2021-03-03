<?php

namespace App\Admin\Controllers;


use App\Admin\Actions\Grid\BuyerMachingManager;
use App\Admin\Actions\Grid\BuyerTagEditer;
use App\Admin\Actions\Grid\Reast;
use App\Admin\Renderable\CategoryTable;
use App\Admin\Repositories\Buyer;
use App\Models\tag;
use App\Models\Category as CategoryAdministrator;
use App\Models\User;
use App\Models\User as Administrator;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Carbon;
use App\Admin\Renderable\UserTable;



class BuyerController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Buyer(['tags','buyerpeoples']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name')->filter(
                Grid\Column\Filter\Like::make()
            );
            //$grid->column('creditcode');
            $grid->column('ceo')->filter(
                Grid\Column\Filter\Like::make()
            );
            $grid->column('tel');
            //$grid->column('fax');
            $grid->column('site');
            $grid->column('category','类目')->display(function ($tt){
                return CategoryAdministrator::find($tt)->name;

            })->badge()->filterByValue('category');
            $grid->column('address')->limit(5, '...')->filter(
                Grid\Column\Filter\Like::make()
            );
            $grid->column('tags','标签')->display(function ($dd){
                return $dd->pluck('name');
            })->badge();
            $grid->column('user_id','主人')->display(function ($userId) {
                return User::find($userId)->name;
            })->filterByValue('user.id');

//            $grid->column('tags','标签数')->display(function ($ss){
//                $count = count($ss);
//
//                return "<span class='label label-warning' style='color: black'>{$count}</span>";
//
//            });
            $grid->column('buyerpeoples','员工数')->display(function ($ss){
                $count = count($ss);

                return "<span class='label label-warning' style='color: black'>{$count}</span>";

            });

            $grid->column('status','状态')
                ->using([0 => '关闭', 1 => '正常'])
                ->dot(
                    [
                        0 => 'danger',
                        1 => Admin::color()->info(),
                        2 => 'primary',
                        3 => 'success',

                    ],
                    'primary' // 第二个参数为默认值
                )->sortable()->filterByValue('status');


//            $grid->column('tags')->display(function ($pp){
//                return $pp->pluck('name');
//            });

//            $grid->column('tag','标签')->display(function ($ss){
//               return
//            });

            $grid->created_at->display(function ($created_at) {
                return Carbon::parse($created_at)->format('Y-m-d');
            })->sortable()->filter(
                Grid\Column\Filter\Gt::make()->datetime('YYYY-MM-DD')
            );


//            $grid->updated_at->display(function ($updated_at) {
//                return Carbon::parse($updated_at)->format('Y-m-d');
//            })->sortable();

//            $grid->buyerpeoples('员工数')->display(function ($buyerpeoples) {
//                $count = count($comments);
//
//                return "<span class='label label-warning'>{$count}</span>";
//            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name');
                //$filter->like('category');

            });

            $grid->tools(function (Grid\Tools $tools) {
                $tools->append(new BuyerTagEditer());

                // excle 导入
                $tools->append(new Reast());

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
        return Show::make($id, new Buyer(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('creditcode');
            $show->field('ceo');
            $show->field('tel');
            $show->field('fax');
            $show->field('site');
            $show->field('address');
            $show->field('mytags','标签');
            $show->field('user_id');
            $show->field('status');
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
        return Form::make(new Buyer(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->text('creditcode');
            $form->text('ceo');
            $form->text('tel');
            $form->text('fax');
            $form->url('site');
            $form->text('address');
            $form->switch('status','状态');

            $form->selectTable('user_id')
                ->required()
                ->title('选择用户')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(UserTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(Administrator::class, 'id', 'name'); // 设置编辑数据显示


            $form->selectTable('category')
                ->default('1',true)
                ->title('选择类目')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(CategoryTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(CategoryAdministrator::class, 'id', 'name'); // 设置编辑数据显示


            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
