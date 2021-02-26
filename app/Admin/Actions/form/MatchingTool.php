<?php

namespace App\Admin\Actions\Form;

use App\Admin\Renderable\CategoryTable;
use App\Models\Customer;
use App\Models\region;

use App\Models\tag;
use App\Models\User;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Form\Row;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;


class MatchingTool extends Form implements LazyRenderable
{
    use LazyWidget;


    public function handle(array $input)
    {
        $id = $this->payload['id'] ?? null;

        //$input['import']==1 是

        return $this->response()->success(json_encode($input['counter']))->refresh();
    }

    public function form()
    {
        $this->disableResetButton();
        $id = $this->payload['id'] ?? null;


        $this->column(12, function (Form $form) {

            $form->row(function (Row $form) {

                $region = Region::all();

                $customer = Customer::all();
                $user= User::all();

                $form->width(3)->select('owner', '主人')->options($user->pluck('name', 'id'))->rules('required', ['required' => '主人不能为空'])->required();
                $form->width(3)->select('customer', '选择客户')->options($customer->pluck('name', 'id'))->rules('required', ['required' => '客户不能为空'])->required();
                $form->width(2)->select('region', '选择客户地区')->options($region->pluck('name', 'id'))->rules('required', ['required' => '地区不能为空'])->required();
                $form->width(2)->text('city', '输入城市(选项)');


                //$form->width(2)->checkbox('import','进出口权')->options(["1"=>"有"])->style('info');


            });

            $form->row(function (Row $form) {
                $tag = tag::all();
//                $form->width(12)->multipleSelectTable('target', '获取企业')
//                    ->dialogWidth('50%') // 弹窗宽度，默认 800px
//                    ->from(CategoryTable::make()); // 设置渲染类实例，并传递自定义参数
                $form->width(2)->text('scope', '经营产品')->datalist($tag->pluck('name', 'id'))->default('化妆品')->rules('required', ['required' => '经营产品不能为空'])->required();
                $form->width(2)->text('companykeyword', '企业名关键字(选项)');
                $form->width(2)->text('Industry', '所属行业(选项)');
                $form->width(2)->text('personal','员工数(选项)')->type('number');
                $form->width(2)->number('counter','匹配数量(最多5000个)')->min(1)->max(5000)->default(50);
                //$form->width(2)->switch('import','进出口权');
            });


        });


    }
}
