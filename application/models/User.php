<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $login
 * @property string $pass
 * @property string $name
 * @property string $auth_key
 * @property string $access_token
 * @property integer $updated_at
 *
 * @property Solutions[] $solutions
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'name', 'auth_key', 'access_token'], 'required'],
            [['login', 'pass', 'name', 'auth_key', 'access_token'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'pass' => 'Pass',
            'name' => 'Name',
            'city' => 'Населенный пункт',
            'neighborhood' => 'Район',
            'school' => 'Школа',
            'class' => 'Класс',
            'teacher' => 'Учитель',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasMany(Solution::className(), ['uid' => 'id']);
    }

    /**
     * Finds user by login
     *
     * @param  string      $login
     * @return static|null
     */
    public static function findByLogin($login)
    {
        $user = User::findOne([
            'login' => $login,
        ]);

        if (isset($user)) {
            return $user;
        }

        return null;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->pass === md5($password);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $user = User::findOne($id);
        return isset($user) ? $user : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::findOne([
            'access_token' => $token,
        ]);

        if (isset($user)) {
            return $user;
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

    public function getSolutionByTask($tid)
    {
        return Solution::findOne(['tid' => $tid, 'uid' => $this->id]);
    }

    public function getSolutionHashByTask($tid)
    {
        $sol =  Solution::findOne(['tid' => $tid, 'uid' => $this->id]);
        if (isset($sol->id)) {
            return $sol->hash;
        } else {
            return '';
        }
    }

    public function asArray()
    {
        return [
            'login'         => $this->login,
            'email'         => $this->email,
            'name'          => $this->name,
            'surname'       => $this->surname,
            'patronymic'    => $this->patronymic,
            'city'          => $this->city,
            'neighborhood'  => $this->neighborhood,
            'school'        => $this->school,
            'class'         => $this->class,
            'teacher'       => $this->teacher,
        ];
    }
}
