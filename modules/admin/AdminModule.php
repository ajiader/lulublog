<?php

namespace app\modules\admin;

use app\core\base\BaseModule;

class AdminModule extends BaseModule
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();

        $this->layout = 'main'; //false 不使用布局文件  null 使用父类布局 filename使用当前Model的布局文化节
        // custom initialization code goes here
    }
}
