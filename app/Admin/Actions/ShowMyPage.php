<?php

namespace App\Admin\Actions;

use App\Models\tag;
use App\Models\User;
use Dcat\Admin\Actions\Action;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Traits\HasPermissions;
use Dcat\Admin\Widgets\Table;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShowMyPage extends Action
{
    /**
     * @return string
     */
    protected $title = '秀';
    protected $btnname = 'refresh';
    protected $btnname2 = 'test';
    protected $attributes = 'text';
    protected $values = '';
    protected $label = 'me';
    protected $modalId = 'show-current-user';

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

        // 接收参数
        $key1 = $request->get('key1');
        //$key2 = $request->get('key2');

        if(!empty($key1)){
            $user=tag::where('name', '=',$key1)->orWhere('name','like','%'.$key1.'%')
                ->get();

            //$user=User::findOrFail($key1);

            if (!$user->isEmpty()){
                $table = Table::make($user->toArray());
                return $this->response()->success('查询成功')->html($table);
            }else{
                //return $this->response()->error('查询失败');
                return $this->response()->script(
                    <<<JS
                    console.log('response', $key1);
                    JS
                );
            }
        }else{
            return $this->response();
        }

    }

    /**
     * 处理响应的HTML字符串，附加到弹窗节点中
     *
     * 这是服务器返回给客户端的HTML代码
     *
     * target 参数是动作按钮的JQ对象
     * html 参数是接口返回HTML字符串
     * data 参数是接口返回的完整数据的json对象
     *
     * @return string
     */
    protected function handleHtmlResponse()
    {
        return <<<'JS'
        function (target, html, data) {
            var $modal = $(target.data('target'));
            $modal.find('.modal-body').html(html)
            $modal.modal('show')
        }
        JS;
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
     * 设置按钮的HTML，这里我们需要附加上弹窗的HTML
     *
     * @return string|void
     */
    public function html()
    {
        // 按钮的html
       $html = parent::html();

        return <<<HTML
               <div class="my-class" style="margin-top:5px">
            <h3>{$this->title}</h3>
            <div class="input-group input-group-sm quick-form-field">
                <input {$this->attributes} placeholder="{$this->label}" class="myinput form-control field_name _normal_"/>
            </div>

            {$html}
             <div class="modal-body"></div>
        </div>
        HTML;
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
     * 设置请求数据
     * 通过这个方法可以设置动作发起请求时需要附带的参数
     * @return string[]
     */
    protected function parameters()
    {
        return ['key1'=>''];
//        return [
//            'key1' => 'value1',
//            'key2' => 'value2',
//        ];
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
                var myinput =$('.myinput').val();
                if(!myinput){
                    return false;
                }else{
                    action.options.data.key1=myinput;
                }

            }
            JS;
    }
}
