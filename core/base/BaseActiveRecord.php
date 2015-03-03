<?php

namespace app\core\base;

use Yii;
use app\models\User;
use yii\db\ActiveRecord;


/**
 * UserController implements the CRUD actions for User model.
 */
class BaseActiveRecord extends ActiveRecord
{
    public function afterValidate()
    {
        parent::afterValidate();
        if($this->hasErrors())
        {
            var_dump($this->errors);
        }
    }
}
