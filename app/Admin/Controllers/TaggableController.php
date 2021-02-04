<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\JobTagTable;
use App\Admin\Renderable\TagTable;
use App\Admin\Repositories\Taggable;

use App\Models\JobTag;
use App\Models\tag;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Contact;
use App\Models\Customer;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
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
            //$form->text('tag_id');
            $form->selectTable('tag_id','标签')
                ->required()
                ->placeholder('选择标签')
                ->title('选择标签')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(TagTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(tag::class, 'id', 'name'); // 设置编辑数据显示
            $form->text('taggable_type');


            /**
             * 获取所有model
             * @return Collection
             */
//            function getModels(): Collection
//            {
//                $models = collect(File::allFiles(app_path()))
//                    ->map(function ($item) {
//                        $path = $item->getRelativePathName();
//                        $class = sprintf('\%s%s',
//                            Container::getInstance()->getNamespace(),
//                            strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));
//
//                        return $class;
//                    })
//                    ->filter(function ($class) {
//                        $valid = false;
//
//                        if (class_exists($class)) {
//                            $reflection = new \ReflectionClass($class);
//                            $valid = $reflection->isSubclassOf(Model::class) &&
//                                !$reflection->isAbstract();
//                        }
//
//                        return $valid;
//                    });
//
//                return $models->values();
//            }
//            $directors=getModels();
//            $form->select('taggable_type')->options($directors)->required();

            $form->text('taggable_id');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
