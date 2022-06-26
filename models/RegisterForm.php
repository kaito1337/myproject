<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{
    public $name;
    public $surname;
    public $patronymic;
    public $login;
    public $email;
    public $password;
    public $password_repeat;
    public $rules;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'surname', 'email', 'password', 'password_repeat','login','rules'], 'required'],
            [['login', 'email'], 'unique', 'targetClass' => User::class, 'message' => 'Пользователь с такими данными уже существует'],
            ['patronymic', 'string'],
            ['rules','boolean'],
            ['rules', 'compare', 'compareValue' => 1],
            // email has to be a valid email address
            ['email', 'email'],
            ['password','string','min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            // verifyCode needs to be entered correctly
            // ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'rules' => 'Согласие с правилами регистрации',
        ];
    }
    public function userRegister(){
        if($this->validate()){
        $user = new User;
        if ($user->load($this->attributes,'')){
            if($user->save())
            {
            return $user;
            }
        }
    }
    return false;
    }
}
