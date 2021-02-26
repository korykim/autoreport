<?php

namespace App\Admin\Actions\Form;

use App\Models\Buyer;
use App\Models\region;
use App\Models\tag;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;


class BuyerSelectList extends Form implements LazyRenderable
{
    use LazyWidget;

    public function handle(array $input)
    {

        // 获取外部传递参数
        //$id = $this->payload['id'] ?? null;


       $bb=buyer::findOrFail($input['select']);
//
//        foreach($input['tags'] as $tt){
//            $tag = new Tag;
//            $tag->name =$tt;
//            $bb->tags()->save($tag);
//        }
//
//        return $this->response()->success('1');


        //$tagNames = explode(','$request->get('tags'));
        $tagIds = [];
        foreach($input['tags'] as $tagName)
        {
            //这个代码是不替换，只增加tag
            //$post->tags()->create(['name'=>$tagName]);
            //
            //下面代码是只保留刚刚提交上的tag
            $tag=tag::firstOrCreate(['name'=>$tagName]);
            if($tag)
            {
                $tagIds[] = $tag->id;
            }

        }
        $bb->tags()->sync($tagIds);
        return $this->response()->success(json_encode($tagIds))->refresh();

    }
    public function form( )
    {
        //在这里可以使用row进行页面布局！

        //去掉重置按钮
        //$this->disableResetButton();

        // 获取外部传递参数
        //$id = $this->payload['id'] ?? null;


        $buyer=Buyer::all();
        $tag=Tag::all();
        $region=Region::all();

        //$this->text('text','标签')->rules('required', ['required' => '标签不能为空']);
        $this->select('select','选择买家')->options($buyer->pluck('name','id'))->rules('required', ['required' => '买家不能为空']);
        $this->tags('tags','标签')->options($tag->pluck('name','id'))->rules('required', ['required' => '标签不能为空']);

        $this->select('region','选择地区')->options($region->pluck('name','id'))->rules('required', ['required' => '地区不能为空']);
//        $this->select('region','选择地区')->options([
//
//            1=> '北京',
//            2=> '天津',
//            3=> '河北',
//            4=> '山西',
//            5=> '内蒙古',
//            6=> '辽宁',
//            7=> '吉林',
//            8=> '黑龙江',
//            9=> '上海',
//            10=> '江苏',
//            11=> '浙江',
//            12=> '安徽',
//            13=> '福建',
//            14=> '江西',
//            15=> '山东',
//            16=> '宁波',
//            17=> '厦门',
//            18=> '河南',
//            19=> '湖北',
//            20=> '湖南',
//            21=> '广东',
//            22=> '广西',
//            23=> '海南',
//            24=> '深圳',
//            25=> '珠海',
//            26=> '重庆',
//            27=> '四川',
//            28=> '贵州',
//            29=> '云南',
//            30=> '西藏',
//            31=> '陕西',
//            32=> '甘肃',
//            33=> '青海',
//            34=> '宁夏',
//            35=> '新疆'
//
//        ]);

    }

    // 这里可以设置默认返回值，返回表单数据，如不需要可以删除此方法
//    public function default()
//    {
//        return [
//            'password'         => '',
//            'password_confirm' => '',
//        ];
//    }



}
