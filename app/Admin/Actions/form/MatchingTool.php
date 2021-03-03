<?php

namespace App\Admin\Actions\Form;

use App\Admin\Renderable\CategoryTable;
use App\Models\Buyer;
use App\Models\BuyerPeople;
use App\Models\Customer;
use App\Models\DataBaseBank;
use App\Models\region;

use App\Models\tag;
use App\Models\User;
use App\Models\WorkPlan;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Form\Row;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Str;


class MatchingTool extends Form implements LazyRenderable
{
    use LazyWidget;


    public function handle(array $input)
    {
        //$id = $this->payload['id'] ?? null;

        $province = region::findOrFail($input['region']);
        $city = $input['city'];
        $personal = $input['personal']; //社保人数
        $personal2 = $input['personal2']; //社保人数
        $companyname = $input['companykeyword'];  //商贸
        $industry = $input['Industry'];  //化妆品  counter
        $scope = $input['scope'];
        $limit = $input['counter']; //$input['counter'];


        $dbs = DataBaseBank::where('province', '=', $province->name)
            ->where('scope', 'LIKE', '%' . $scope . '%')
            ->where('companyname', 'LIKE', '%' . $companyname . '%')
            //->where('personal', '>=', $personal)
            ->whereBetween('personal',[$personal,$personal2])
            ->where('industry', 'LIKE', '%' . $industry . '%')
            //->whereNotNull('email')
            //->whereNotNull('tel1')
            ->where('city', 'LIKE', '%' . $city . '%')
            ->whereRaw("email REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")
//            ->havingRaw("tel1 REGEXP '^[1][3456789][0-9]{9}$'")
//            ->orHavingRaw("tel2 REGEXP '^[1][3456789][0-9]{9}$'")
            ->limit($limit)
            ->orderByDesc('personal')
            ->get();

        foreach ($dbs as $db) {


            $buyer = Buyer::updateOrCreate(
                ['creditcode' => $db->creditcode],
                [
                    'name' => $db->companyname,
                    'ceo' => $db->owner,
                    'tel' => str_replace(".0","",$db->tel1),
                    'site' => $db->site,
                    'address' => $db->address,
                    'status' => 1,
                    'category' => 3,
                    'user_id' => $input['owner']
                ]

            );

            if ($buyer->wasRecentlyCreated) {
                $buyerpeoples = new BuyerPeople;
                $buyerpeoples->name = $db->owner;
                $buyerpeoples->email = $db->email;
                $buyerpeoples->tel = str_replace(".0","",$db->tel1);
                //$buyerpeoples->hp='';
                $buyer->buyerpeoples()->save($buyerpeoples);
            }


            $upsert=WorkPlan::updateOrCreate(
                ['buyer_id'=>$buyer->id],
                [
                    'jobId'=>Str::orderedUuid()->toString(),
                    'customer_id'=>$input['customer'],
                    'personal_name'=>$db->owner,
                    'total_Personal'=>$db->personal,
                    'email'=>$db->email,
                    'tel1'=>str_replace(".0","",$db->tel1),
                    'tel2'=>str_replace(".0","",$db->tel2),
                    'site'=>$db->site

                ]
            );


        }

        return $this->response()->success(json_encode("1"))->refresh();
    }

    public function form()
    {
        $this->disableResetButton();
        // $id = $this->payload['id'] ?? null;


        $this->column(12, function (Form $form) {

            $form->row(function (Row $form) {

                $region = Region::all();

                $customer = Customer::all();
                $user = User::all();

                $form->width(4)->select('owner', '主人')->options($user->pluck('name', 'id'))->rules('required', ['required' => '主人不能为空'])->required();
                $form->width(4)->select('customer', '选择客户')->options($customer->pluck('name', 'id'))->rules('required', ['required' => '客户不能为空'])->required();
                $form->width(4)->select('region', '选择客户地区')->options($region->pluck('name', 'id'))->rules('required', ['required' => '地区不能为空'])->required();


                //$form->width(2)->checkbox('import','进出口权')->options(["1"=>"有"])->style('info');


            });

            $form->row(function (Row $form) {
                $tag = tag::all();
//                $form->width(12)->multipleSelectTable('target', '获取企业')
//                    ->dialogWidth('50%') // 弹窗宽度，默认 800px
//                    ->from(CategoryTable::make()); // 设置渲染类实例，并传递自定义参数
                $form->width(4)->text('city', '输入城市(选项)');
                $form->width(4)->text('scope', '经营产品')->datalist($tag->pluck('name', 'id'))->default('化妆品')->rules('required', ['required' => '经营产品不能为空'])->required();
                $form->width(4)->text('companykeyword', '企业名关键字(选项)');
            });

            $form->row(function (Row $form) {

                $form->width(3)->text('Industry', '所属行业(选项)')->default("批发");
                $form->width(2)->text('personal', '员工数(最低)')->type('number')->default(5);
                $form->width(2)->text('personal2', '员工数(最高)')->type('number')->default(10);
                $form->width(3)->number('counter', '匹配数量(最多200个)')->min(1)->max(200)->default(5);

                //$form->width(2)->switch('import','进出口权');
            });


        });


    }
}
