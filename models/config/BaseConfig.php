<?php

namespace app\models\config;

use app\core\base\BaseModel;
use app\models\Config;
use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 */
class BaseConfig extends BaseModel
{
    protected function getConfigKey()
    {
//        return $this->attributes();
        return array_keys($this->attributeLabels());
    }

    public function initAll()
    {
        $this->initAllInternael();
    }
    public  function saveAll()
    {
        $this->saveAllInternael();
    }
    protected function initAllInternael()
    {
        $keys = $this->getConfigKey();
        foreach($keys as $key)
        {
            $this->initOneInternael($key);
        }
    }
    protected function initOneInternael($key, $defuletValue = '')
    {
        $model = Config::findOne(['key' => $key]);

        if($model != null)
        {
            $this->$key =  $model->value;
        }else{
            $model = new Config();
            $model->key = $key;
            $model->value = '';
            $model->save();
            $this->$key =  $defuletValue;
        }
    }

    protected function saveAllInternael()
    {
        $keys = $this->getConfigKey();
        foreach($keys as $key){
            $this->saveOneinternael($key, $this->$key);
        }
    }
    protected  function saveOneinternael($key, $value)
    {
        Config::updateAll(['value' => $value], ['key' =>  $key]);
        /*
        $model = Config::findOne(['key' => $key ]);
        if($model != null)
        {
            Config::updateAll(['value' => $value], ['key' =>  $key]);
        }else{
            $model = new Config();
            $model->key = $key;
            $model->value = $value;
            $model->save();
        }*/
    }
}
