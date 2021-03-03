<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\BatchAction;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

//获取复选框选中的 ID 数组
class GetIDS extends BatchAction
{
    /**
     * @return string
     */
	protected $title = 'Title';

    //protected $action;

//    public function __construct($title, $action = 1)
//    {
//        $this->title = $title;
//        $this->action = $action;
//    }


    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {

        $key1 = $request->get('ids');
        //$this->getKey()

        return $this->response()->success(json_encode($key1));

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
        // $this->setHtmlAttribute('data-target', '#' . $this->modalId);
        //$this->setHtmlAttribute('sytle', 'margin-top:25px');

       // $this->defaultHtmlAttribute('style', 'cursor: pointer; margin-top:5px');

        parent::setupHtmlAttributes();
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
     * 设置动作发起请求前的回调函数，返回false可以中断请求.
     *
     * @return string
     */
    public function actionScript()
    {
        $warning = __('务必选取要使用的数据!');

        return <<<JS
            function (data, target, action) {
                var key = {$this->getSelectedKeysScript()}

                if (key.length === 0) {
                    Dcat.warning('{$warning}');
                    return false;
                }

                // 设置主键为复选框选中的行ID数组
                action.options.data.ids=key;

            }
            JS;
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [
            'ids' =>array(),
        ];
    }
}
