<?php

namespace App\Admin\Actions;

use App\Admin\Actions\Form\BuyerSelectList;

use App\Models\Buyer;
use App\Models\tag;

use Dcat\Admin\Actions\Action;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\HasPermissions;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BuyerTagManager extends Action
{
    /**
     * @return string
     */
    protected $title = '添加';
    protected $attributes = 'text';
    protected $values = '1';
    protected $label = 'UID';
    protected $label2 = 'Tag';
    protected $modalId = 'tag-buyer-manager';

    public function __construct($values = null)
    {
        if ($values) {
            $this->values = $values;
        }
    }

    /**
     * 设置HTML标签的属性
     *
     * @return void
     */
    protected function setupHtmlAttributes()
    {
        // 添加class
        $this->addHtmlClass('btn btn-primary');
        //$this->addHtmlClass('form-control');

        // 保存弹窗的ID
        $this->setHtmlAttribute('data-target', '#' . $this->modalId);
        //$this->setHtmlAttribute('sytle', 'margin-top:25px');

        $this->defaultHtmlAttribute('style', 'cursor: pointer; margin-top:5px');

        parent::setupHtmlAttributes();
    }

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {
        // dump($this->getKey());

        $key1 = $request->get('uid');
        $key2 = $request->get('tag');

        $bb = buyer::findOrFail($key1);

        $tag = new Tag;
        $tag->name = $key2;

        $rs = $bb->tags()->save($tag);

        return $this->response()->success($rs);
    }


    /**
     * 设置按钮的HTML，这里我们需要附加上弹窗的HTML
     *
     * @return string|void
     */
    public function html()
    {
        // 按钮的html
        //$html = parent::html();

        //使用form组件，创建select
        $BuyerSelectList = new BuyerSelectList();

//        <div class="my-class" style="margin-top:5px">
//            <h3>买家tag</h3>
//            <div class="input-group input-group-sm quick-form-field">
//                <input {$this->attributes} placeholder="{$this->label}" class="myinput2 form-control field_name _normal_"/>
//                <input {$this->attributes} placeholder="{$this->label2}" class="myinput3 form-control field_name _normal_"/>
//            </div>
//            {$html}

        return <<<HTML
             {$BuyerSelectList->render()}
        </div>
        HTML;
    }

    /**
     * 发起请求之前执行的 JS 代码 (actionScript)
     * @return string
     */
    protected function actionScript()
    {
        return <<<JS
            function (data, target, action) {
                //console.log('发起请求之前', action);
                console.log('发起请求之前', data, target, action);

                // return false; 在这里return false可以终止执行后面的操作

                // 更改传递到接口的主键值
                //action.options.key = 123;

                //给服务器提交刚刚写入的input数据
                var myinput =$('.myinput2').val();
                var myinput3 =$('.myinput3').val();
                if(!myinput){
                    return false;
                }else{
                    action.options.data.uid=myinput;
                    action.options.data.tag=myinput3;
                }

            }
            JS;
    }

    /**
     * 此方法用于在 render 方法执行完毕之前添加 JS 代码
     *
     * @return string
     */
    protected function script()
    {
        return <<<JS
         $(document).ready(function(){
            $('.combobox').combobox();
          });
        JS;
    }

    /**
     * @return string|array|void
     */
    public function confirm()
    {
        // return ['Confirm?', 'contents'];
    }

    /**
     * @param Model|Authenticatable|HasPermissions|null $user
     *
     * @return bool
     */
    protected function authorize($user): bool
    {
        return true;
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [
            'uid' => '',
            'tag' => ''
        ];
    }
}
