<?php


namespace App\Admin\Extensions\Tools;


use Dcat\Admin\Grid\BatchAction;
use Dcat\Admin\Actions\Response;
use Illuminate\Http\Request;

class ReleasePost extends BatchAction
{
    protected $action;

    public function __construct($title, $action = 1)
    {
        $this->title = $title;
        $this->action = $action;
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

        $this->defaultHtmlAttribute('style', 'cursor: pointer; margin-top:5px');

        parent::setupHtmlAttributes();
    }

    // 确认弹窗信息
    public function confirm()
    {
        //return '您确定要发布已选中的文章吗？';
    }


    /**
     * @param Request $request
     * @return Response
     */

    public function handle(Request $request)
    {
        $key1 = $request->get('key');

        return $this->response()->success(json_encode($key1))->refresh();
    }

    /**
     * 设置动作发起请求前的回调函数，返回false可以中断请求.
     *
     * @return string
     */
    public function actionScript()
    {
        $warning = __('No data selected!');

        return <<<JS
            function (data, target, action) {
                var key = {$this->getSelectedKeysScript()}

                if (key.length === 0) {
                    Dcat.warning('{$warning}');
                    return false;
                }

                // 设置主键为复选框选中的行ID数组
                action.options.data.key=key;
            }
            JS;
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [
            'title' => '',
            'key' => '',

        ];
    }

}
