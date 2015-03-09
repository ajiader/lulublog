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
    public static function find()
    {
        return parent::find();
    }
    public static function findOne($condition=null, $orderBy=null)
    {
        $query = static::find();
        if($condition != null)
        {
            $query->andWhere($condition);
        }
        if($orderBy != null)
        {
            $query->orderBy($orderBy);
        }
        return $query->one();
    }

    public static function findAll($condition=null, $orderBy=null, $limit=null)
    {
        $query = static::find();
        if($condition != null)
        {
            $query->andWhere($condition);
        }
        if($orderBy != null)
        {
            $query->orderBy($orderBy);
        }
        if($limit != null)
        {
            $query->limit($limit);
        }
        return $query->all();
    }

    public function afterValidate()
    {
        parent::afterValidate();
        if($this->hasErrors())
        {
            var_dump($this->errors);
        }
    }
}
