<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $id_role
 * @property string $auth_key
 *
 * @property Orders[] $orders
 * @property Role $role
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'required'],
            [['id_role'], 'integer'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password', 'auth_key'], 'string', 'max' => 255],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['id_role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'id_role' => 'Id Role',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'id_role']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    
    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByUsername($login){
        return static::findOne(['login' => $login]);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->password = \Yii::$app->security->generatePasswordHash($this->password);
                $this->auth_key = \Yii::$app->security->generateRandomString();
                // $this->id_role = Role::getRole('Администратор');
                $this->id_role = Role::getRole('Пользователь');
            }
            return true;
        }
        return false;
    }

    public function getIsAdmin(){
        return $this->id_role == Role::getRole('Администратор');
    }

}

