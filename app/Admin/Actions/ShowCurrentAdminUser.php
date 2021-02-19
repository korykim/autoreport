<?php

namespace App\Admin\Actions;

use Dcat\Admin\Actions\Action;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Traits\HasPermissions;
use Dcat\Admin\Widgets\Table;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShowCurrentAdminUser extends Action
{

    /**
     * @return string
     */
    protected $title = '个人信息';

    /**
     * @var string
     */
    protected $modalId = 'show-current-user';

    /**
     * 处理当前动作的请求接口，如果不需要请直接删除
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {
        // dump($this->getKey());


        // 获取当前登录用户模型
        $user = Admin::user();
        // 这里我们用表格展示模型数据
        $table = Table::make($user->toArray());

        return $this->response()
            ->success('查询成功')
            ->html($table);


        //return $this->response()->success('Processed successfully.')->redirect('/');
    }

    /**
     * 发起请求之前执行的 JS 代码 (actionScript)
     * @return string
     */
    protected function actionScript()
    {
        return <<<JS
            function (data, target, action) {
                console.log('发起请求之前', data, target, action);

                // return false; 在这里return false可以终止执行后面的操作

                // 更改传递到接口的主键值
                action.options.key = 123;
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
        console.log('!.!.!.!')
        JS;
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

        // 保存弹窗的ID
        $this->setHtmlAttribute('data-target', '#' . $this->modalId);

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
        {$html}
        <div class="modal fade" id="{$this->modalId}" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title">{$this->title()}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

              </div>
              <div class="modal-body"></div>
            </div>
          </div>
        </div>
        HTML;
    }

    /**
     * 确认弹窗信息，如不需要可以删除此方法
     *
     * @return string|void
     */
    public function confirm()
    {
        // return ['Confirm?', 'contents'];
        //return ['你确定要查询？', '真的吗？'];
    }


    /**
     * 动作权限判断，返回false则表示无权限，如果不需要可以删除此方法
     *
     * @param Model|Authenticatable|HasPermissions|null $user
     *
     * @return bool
     */
    protected function authorize($user): bool
    {
        return true;
    }


    /**
     * 通过这个方法可以设置动作发起请求时需要附带的参数，如果不需要可以删除此方法
     *
     * @return array
     */
    protected function parameters()
    {
        return [];
    }
}
