<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-01-30
 * Time: 13:23
 */

namespace app\models;


use yii\base\Model;

class EntryForm extends Model {
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email']
        ];
    }
}