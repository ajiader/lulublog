<?php

namespace app\modules\admin\modules\rbac\models;

use app\core\base\BaseModel;
use Yii;

/**
 * This is the model class for table "lulu_auth_item_child".
 *
 * @property string $parent
 * @property string $child
 *
 * @property AuthRule $parent0
 * @property AuthRule $child0
 */
class ItemChild extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lulu_auth_item_child';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => 'Parent',
            'child' => 'Child',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(AuthRule::className(), ['name' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0()
    {
        return $this->hasOne(AuthRule::className(), ['name' => 'child']);
    }
}
