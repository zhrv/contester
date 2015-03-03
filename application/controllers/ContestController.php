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
use app\models\Task;
use app\models\Checkergroup;
//use yii\base\Widget;
//use yii\helpers\Html;

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

    public function actionResult($id)
    {
        $contest = Contest::findOne($id);
        if (!$contest) {
            throw new HttpException(404, 'Турнир не существует...');
        }

//        return $this->render('result', [
//            'contest' => $contest,
//        ]);



        $tasksArr = [];
        $tasks = Task::find()
            ->where(['cid' => $contest->id])
            ->orderBy('id')
            ->all();
        foreach ($tasks as $task) {




            $sol = Solution::find()
                ->with('tests')
                ->where(['tid' => $task->id, 'uid' => Yii::$app->user->identity->getId()])
                //->orderBy('created_at desc')
                ->limit(1)
                ->one();

            $testsArr = [];
            if ($sol) {
                foreach ($sol->task->checkergroups as $group) {
                    $tests = Test::find()
                        ->leftJoin('checkertests', 'checkertests.id = tests.cid')
                        ->where(['tests.sid' => $sol->id, 'checkertests.gid' => $group->id])
                        ->all();

                    $gr = [];
                    $ok = true;
                    $notEmpty = false;
                    $gr['tests'] = [];
                    $gr['score'] = 0;
                    $grScore = 0;
                    foreach ($tests as $test) {
                        $notEmpty = true;
                        $gr['tests'][] = [
                            'num' => $test->num,
                            'res' => $test->res,
                        ];
                        if ($test->res == Test::RESULT_OK) {

                            $grScore += $test->checkertest->scores;
                        } elseif ($test->checkertest->checkergroup->method == Checkergroup::METHOD_TOTAL) {
                            $ok = false;
                            //break;
                        }
                    }
                    if ($ok && $notEmpty) {
                        if ($group->method == Checkergroup::METHOD_TOTAL) {
                            $gr['score'] = $group->scores;
                        }
                        else {
                            $gr['score'] = $grScore;
                        }
                    }
                    //$gr['score'] = $ok ? $grScore : 0;

                    $testsArr[] = $gr;
                }



                $tasksArr[] = [
                    'id' => $task->id,
                    'title' => $task->title,
                    'content' => $task->content,
                    'hash' => $sol->hash,
                    'solution' => $sol,
                    'tests' => $testsArr,
                ];
            }

        }
        return $this->render('result', ['tasks' => $tasksArr, 'contest' => $contest]);


    }


    public function actionSolution($id)
    {
        $model = Solution::findOne($id);

        if (!$model) {
            throw new HttpException(404, 'Решение не найдено.');
        }
        if ($model->uid !== Yii::$app->user->identity->getId()) {
            throw new HttpException(503, 'Доступ запрещен.');
        }

        return $this->render('solution', [
            'model' => $model,
            'contest' => $model->contest,
        ]);


    }

    public function actionReport($id)
    {
        $model = Solution::findOne($id);

        if (!$model) {
            throw new HttpException(404, 'Решение не найдено.');
        }
        if ($model->uid !== Yii::$app->user->identity->getId()) {
            throw new HttpException(503, 'Доступ запрещен.');
        }

        $result = [];
        if (!empty($model->result)) {
            $result = json_decode($model->result);
        }

        return $this->render('report', [
            'model' => $model,
            'result' => $result,
            'contest' => $model->contest,
        ]);


    }

}
