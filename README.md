# mini system

> autoreport

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
