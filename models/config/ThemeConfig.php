<?php

namespace app\models\config;


use app\models\Config;
use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 */
class ThemeConfig extends BaseConfig
{
    public $sys_site_theme;

    public function rules()
    {
        return [
            [['sys_site_theme'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_site_theme' => '网站主题',
        ];
    }

}
