<?php

namespace app\modules\admin;

use yii\web\HttpException;

class AdminModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public $defaultRoute = 'contest';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (\Yii::$app->user->identity->login != 'admin') {
                throw new HttpException(503, 'Доступ запрещен!');
                return false;
            }
            return true;  // or false if needed
        } else {
            return false;
        }
    }

}
