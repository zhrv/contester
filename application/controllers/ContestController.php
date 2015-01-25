<?php

namespace app\controllers;

use app\models\Solution;
use app\models\Test;
use Yii;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SolutionForm;
use app\models\Contest;
use app\components\testers\TesterFactory;
use yii\web\HttpException;
use yii\data\ActiveDataProvider;

class ContestController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout','index'],
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

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Contest::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionContest($id = null, $action = 'result') {
        //echo time();exit;
        if (!isset($id)) {
            throw new HttpException(404, 'Страница не найдена...');
            return;
        }
        $contest = Contest::findOne($id);
        if (!$contest) {
            throw new HttpException(404, 'Турнир не существует...');
        }
        $curTime = time();
        if ($curTime < $contest->start_at || $curTime > $contest->finish_at || $contest->status != Contest::STATUS_ACTIVE) {
            throw new HttpException(503, 'Турнир не активен...');
        }
        $model = new SolutionForm();
        if ($model->load(Yii::$app->request->post())) {
            //return $this->goBack();
            $md5 = md5($model->code);
            $solution = Solution::find()
                ->where([
                    'uid' => Yii::$app->user->identity->id,
                    'tid' => $model->task,
                ])
                ->one();
            if (!isset($solution->id)) {
                $solution = new Solution();
            }

            $solution->uid = Yii::$app->user->identity->id;
            $solution->tid = $model->task;
            $solution->lid = $model->lang;
            $solution->code = $model->code;
            $solution->created_at = time();
            $solution->hash = $md5;
            $solution->save();

            if (isset($solution->id)) {
                $tester = TesterFactory::create($solution);
                try {
                    $solution->parseResult($tester->getResult());
                    Yii::$app->getSession()->setFlash('success', 'Решение сохранено. Hash: '. $md5);
                }
                catch (Exception $e) {
                    Yii::$app->getSession()->setFlash('error', 'Произошла ошибка: '. $e->getMessage());
                }
                catch (ErrorException $e) {
                    Yii::$app->getSession()->setFlash('error', 'Произошла ошибка: '. $e->getMessage());
                }
            } else {
                Yii::$app->getSession()->setFlash('error', 'Произошли ошибки при сохранении решения!');
            }

        }
        return $this->render('contest', [
            'model' => $model,
            'contest' => $contest,
        ]);

    }
}
