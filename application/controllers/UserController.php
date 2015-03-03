<?php

namespace app\controllers;

use app\models\Solution;
use app\models\Test;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\forms\LoginForm;
use app\models\forms\UserForm;
use app\models\ContactForm;
use app\models\SolutionForm;
use app\components\testers\TesterFactory;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRegister()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new UserForm(['scenario' => 'create']);
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->goBack();
        } else {
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new UserForm(['scenario' => 'update']);
        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            Yii::$app->getSession()->setFlash('success', 'Данные сохранены');
        }
        $model->attributes=\Yii::$app->user->identity->toArray();
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionPassword()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new UserForm(['scenario' => 'password']);
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            Yii::$app->getSession()->setFlash('success', 'Пароль изменен');
            return $this->redirect(['user/update']);
        }
        //$model->attributes=\Yii::$app->user->identity->toArray();
        return $this->render('password', [
            'model' => $model,
        ]);

    }

}
