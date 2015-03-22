<?php

namespace app\modules\admin\modules\rbac\controllers;

use app\core\back\BaseBackController;
use yii\web\Controller;

/*
 * @return DbManager
 * */
class BaseController extends BaseBackController
{
    public $authManager;
    public function init()
    {
        parent::init();
        $this->authManager = \Yii::$app->authManager;
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
}
