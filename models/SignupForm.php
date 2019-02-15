<?php

namespace app\models;
use yii\base\Model;


class SignupForm extends Model{
    public $name;
    public $email;
    public $password;

    public function rules() {
        return [
            [['name', 'email', 'password'], 'required', 'message' => 'Заполните поле'],
            [['reg_date'], 'default', 'value' => date('Y-m-d H:i:s')],
            ['email', 'unique', 'targetClass' => User::className(),  'message' => 'Этот email уже занят']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Имя',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
        ];
    }
}