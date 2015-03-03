<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \app\core\base\BaseActiveRecord implements \yii\web\IdentityInterface
{
    public $password;
    public $rememberMe;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'password'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 8],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    public function scenarios()//场景
    {
        $parent = parent::scenarios();//默认场景所有字段
        $parent['login'] = ['username', 'password']; //登录场景
        $parent['register'] = ['username', 'password', 'email']; //注场景
        return $parent;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return User::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password, $password_hash)
    {
        return Yii::$app->security->validatePassword($password,$password_hash);
    }

    public function login()
    {

        $user = User::findOne(['username'=>$this->username]);

        if ($user != null) {
            if($this->validatePassword($this->password, $user->password_hash))
            {
                \Yii::$app->user->login($user, 50000);
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
}
