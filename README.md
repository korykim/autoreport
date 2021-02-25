# mini system

- git 问题解决
```
git config --global credential.helper wincred
```
- SelectTable Add onhidden event
```php
    public function __construct($column, $arguments = [])
    {
        parent::__construct($column, $arguments);

        $this->dialog = DialogTable::make($this->label)->onHidden("
        var bid=document.getElementsByName('buyer_id')[1].value;
        document.cookie = 'cookie1='+bid+'; Domain=autoreport.tt; path=/'
        ");
    }
```
- 自定义组件，创建 Form-> Action 调用
  - Form可以在AdminController或者在Action中使用make()调用，或者在返回HTML中form->render()来使用。
  - 在Action里给Form传递参数。`form::make()->payload(['id' => $this->getKey()])`
  - Form 接受参数 `$id = $this->payload['id'] ?? null;`
    
- Action是开发自定义页面的终结者。可以自定义目标页面，而且使用actionScript（发起请求之前执行的
  JS代码）功能与后台进行交互。
  而且必须搭配parameters（设置动作发起请求时需要附带的参数）才可以使用，发起请求前使用jQuery获取页面组件value
  然后在actionScript中与parameters参数进行数据绑定，最终传给后台handle进行数据交互。
    
- 自定义页面时尽可能使用dcatadmin提供的组件，凡是跟后台有数据交互的功能，务必用form来进行开发。
  使用Form的话，好处是提取，修改，删除数据极为方便。
