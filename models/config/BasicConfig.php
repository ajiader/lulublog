<?php

namespace app\models\config;

use app\core\base\BaseModel;
use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 */
class BasicConfig extends BaseModel
{
    public $site_name;
    public $site_description;
    public function rules()
    {
        return [
            [['site_name', 'site_description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site_name' => '网站名称',
            'site_description' => '网站描述',
        ];
    }

    public function save()
    {
        
    }
}
