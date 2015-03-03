<?php

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class UserForm extends Model
{
    public $login;
    public $pass;
    public $passRe;
    public $email;
    public $surname;
    public $name;
    public $patronymic;
    public $city;
    public $neighborhood;
    public $school;
    public $class;
    public $teacher;

    public $newPass;
    public $newPassRe;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['login', 'pass', 'passRe', 'email', 'surname', 'name', 'patronymic', 'city', 'school', 'class'], 'required', 'on' => 'create'],
            ['passRe', 'compare', 'compareAttribute' => 'pass', 'on' => 'create'],

            [['email', 'surname', 'name', 'city', 'school', 'class'], 'required', 'on' => 'update'],
            [['email', 'surname', 'name', 'patronymic', 'city', 'neighborhood', 'school', 'class', 'teacher'], 'safe', 'on' => 'update'],

            [['pass', 'newPass', 'newPassRe'], 'required', 'on' => 'password'],
            ['newPassRe', 'compare', 'compareAttribute' => 'newPass', 'on' => 'password'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'pass' => 'Пароль',
            'passRe' => 'Повтор пароля',
            'email' => 'Эл. почта',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'city' => 'Населенный пункт',
            'neighborhood' => 'Район',
            'school' => 'Школа',
            'class' => 'Класс',
            'teacher' => 'Учитель',
            'newPass' => 'Новый пароль',
            'newPassRe' => 'Повтор нового пароля',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect login or password.');
            }
        }
    }

    /**
     * Register a user.
     * @return boolean whether the user is logged in successfully
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->login        = $this->login;
            $user->pass         = md5($this->pass);
            $user->auth_key     = md5($user->pass);
            $user->access_token = md5($user->auth_key);
            $user->email        = $this->email;
            $user->name         = $this->name;
            $user->surname      = $this->surname;
            $user->patronymic   = $this->patronymic;
            $user->city         = $this->city;
            $user->neighborhood = $this->neighborhood;
            $user->school       = $this->school;
            $user->class        = $this->class;
            $user->teacher      = $this->teacher;
            if ($user->save()) {
                return Yii::$app->user->login($user, false ? 3600*24*30 : 0);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Register a user.
     * @return boolean whether the user is logged in successfully
     */
    public function update()
    {
        if ($this->validate()) {
            $user = User::findOne(['id' => Yii::$app->user->identity->getId()]);
            $user->email        = $this->email;
            $user->name         = $this->name;
            $user->surname      = $this->surname;
            $user->patronymic   = $this->patronymic;
            $user->city         = $this->city;
            $user->neighborhood = $this->neighborhood;
            $user->school       = $this->school;
            $user->class        = $this->class;
            $user->teacher      = $this->teacher;
            if ($user->save()) {
                Yii::$app->user->setIdentity($user);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        if ($this->validate()) {
            $user = User::findOne(['id' => Yii::$app->user->identity->getId()]);
            if ($user->validatePassword($this->pass)){
                $user->pass = md5($this->newPass);
                if ($user->save()) {
                    Yii::$app->user->setIdentity($user);
                    return true;
                } else {
                    return false;
                }
            } else {
                $this->addError('pass', 'Неверный пароль');
            }
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[login]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByLogin($this->login);
        }

        return $this->_user;
    }
}
