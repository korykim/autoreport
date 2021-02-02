<?php

namespace App\Admin\Renderable;

use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;
//use Dcat\Admin\Models\Administrator;
use App\Models\JobTag as Administrator;
use Illuminate\Support\Carbon;

class JobTagTable extends LazyRenderable
{
    public function grid(): Grid
    {
        // 获取外部传递的参数
        $id = $this->id;

        return Grid::make(new Administrator(), function (Grid $grid) {
            $grid->column('id');

            $grid->column('name');
            //$grid->column('email');


//            $grid->created_at->display(function ($created_at) {
//                return Carbon::parse($created_at)->format('Y-m-d');
//            });
//
//            $grid->updated_at->display(function ($updated_at) {
//                return Carbon::parse($updated_at)->format('Y-m-d');
//            });

            // 指定行选择器选中时显示的值的字段名称
            // 指定行选择器选中时显示的值的字段名称
            // 指定行选择器选中时显示的值的字段名称
            // 如果表格数据中带有 “name”、“title”或“username”字段，则可以不用设置
            $grid->rowSelector()->titleColumn('name');

            $grid->quickSearch(['id', 'name']);

            $grid->paginate(10);
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {

                $filter->like('name')->width(4);
            });
        });
    }
}
