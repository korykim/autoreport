<?php

namespace App\Admin\Actions;

use App\Admin\Actions\Form\MatchingTool;
use Dcat\Admin\Actions\Action;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BuyerMachingManager extends Action
{
    /**
     * @return string
     */
	protected $title = 'Title';

    protected $modalId = 'bmm-buyer-manager';
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

        return $this->response()->success('Processed successfully.')->redirect('/');
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


    public function html()
    {
        $form = new MatchingTool();
        return <<<HTML
             {$form->render()}
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
     * @return array
     */
    protected function parameters()
    {
        return [];
    }
}
