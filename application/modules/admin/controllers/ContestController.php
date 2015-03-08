<?php

namespace app\modules\admin\controllers;

use app\models\User;
use Yii;
use app\models\Contest;
use app\models\Task;
use app\models\Test;
use app\models\Solution;
use app\models\Checkergroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\testers\TesterFactory;
use yii\base\Exception;
use yii\base\ErrorException;

/**
 * ContestController implements the CRUD actions for Contest model.
 */
class ContestController extends Controller
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Contest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Contest::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contest model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find()
                ->where(['cid' => $id]),
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Contest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contest();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Contest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionUsers($id, $action='result', $print = null) {
        if (isset($print) && ($print == 1)) {
            $this->layout = 'print';
        }

        $contest = $this->findModel($id);
        $users = $contest->getUsers();

        $tasks = Task::findAll(['cid' => $id]);
        $tasksArr = [];
        foreach ($tasks as $task) {
            $tasksArr[$task->id] = $task->title;
        }

        $views = [
            'result' => 'users',
            'hash' => 'hashs',
        ];
        return $this->render($views[$action], [
            'users' => $users,
            'contest' => $contest,
            'tasks' => $tasksArr,
            'layout' => $this->layout,
        ]);
    }

    public function actionUser($contestId, $userId)
    {
        $contest = Contest::findOne(['id' => $contestId]);
        $user = User::findOne(['id' => $userId]);

        $resVals = Test::getResultsByName();

        $tasksArr = [];
        $tasks = Task::find()
            ->where(['cid' => $contestId])
            ->orderBy('id')
            ->all();
        foreach ($tasks as $task) {




            $sol = Solution::find()
                ->with('task')
                ->where(['tid' => $task->id, 'uid' => $userId])
                //->orderBy('created_at desc')
                ->limit(1)
                ->one();
            if (!$sol) continue;

            $testsArr['solution'] = $sol;
            $testsArr['tests'] = [];
            if (!empty($sol->result)) {
                $res = json_decode($sol->result);
                $tests = [];
                foreach ($res->report as $resItem) {
                    $tests[$resItem->id] = $resItem;
                }
                $num = 0;
                if (isset($res->status) && $res->status=="ok") {
                    foreach ($sol->task->checkergroups as $group) {
                        $gr = [];
                        $ok = true;
                        $notEmpty = false;
                        $gr['tests'] = [];
                        $gr['score'] = 0;
                        $grScore = 0;
                        foreach ($group->checkertests as $chtest) {
                            $t = $tests[$chtest->id];
                            $notEmpty = true;

                            $gr['tests'][] = [
                                'num' => ++$num,
                                'res' => $resVals[$t->result],
                            ];
                            if ($resVals[$t->result] == Test::RESULT_OK) {

                                $grScore += $chtest->scores;
                            } elseif ($group->method == Checkergroup::METHOD_TOTAL) {
                                $ok = false;
                                //break;
                            }
                        }
                        if ($ok && $notEmpty) {
                            if ($group->method == Checkergroup::METHOD_TOTAL) {
                                $gr['score'] = $group->scores;
                            } else {
                                $gr['score'] = $grScore;
                            }
                        }
                        //$gr['score'] = $ok ? $grScore : 0;

                        $testsArr['tests'][] = $gr;
                    }
                    $tasksArr[] = [
                        'id' => $task->id,
                        'title' => $task->title,
                        'content' => $task->content,
                        'hash' => $sol->hash,
                        'tests' => $testsArr,
                        'status' => 'ok',
                    ];
                } else {
                    $status = "bad";
                    if (!isset($res->status) && $sol->status == 0) {
                        $status = "in_queue";
                    }
                    if (!isset($res->status) && $sol->status != 0) {
                        $status = "error";
                    }
                    $tasksArr[] = [
                        'id' => $task->id,
                        'title' => $task->title,
                        'content' => $task->content,
                        'hash' => $sol->hash,
                        'tests' => $testsArr,
                        'status' => $status,
                    ];
                }


            } else {
                $status = "bad";
                if ($sol->status == 0) {
                    $status = "in_queue";
                }
                if ($sol->status != 0) {
                    $status = "error";
                }
                $tasksArr[] = [
                    'id' => $task->id,
                    'title' => $task->title,
                    'content' => $task->content,
                    'hash' => $sol->hash,
                    'tests' => $testsArr,
                    'status' => $status,
                ];

            }

        }
        return $this->render('user', [
            'tasks' => $tasksArr,
            'contest' => $contest,
            'user' => $user,
        ]);
    }

    public function actionSolution($id) {
        $model = Solution::findOne($id);
        return $this->render('solution', [
            'model' => $model,
        ]);
    }

    public function actionJson($id) {
        $model = Solution::findOne($id);
        return $this->render('json', [
            'model' => $model,
        ]);
    }

    public function actionConfig($id) {
        $model = Solution::findOne($id);
        return $this->render('config', [
            'model' => $model,
        ]);
    }

    public function actionCheck($id) {
        $solution = Solution::findOne($id);
        $solution->status = 0;
        $solution->result = '';
        $solution->save();
        /*try {
            $tester = TesterFactory::create($solution);
            $solution->parseResult($tester->getResult());
            Yii::$app->getSession()->setFlash('success', 'Решение перепроверено.');
        }
        catch (Exception $e) {
            Yii::$app->getSession()->setFlash('error', 'Произошла ошибка: '. $e->getMessage());

        }
        catch (ErrorException $e) {
            Yii::$app->getSession()->setFlash('error', 'Произошла ошибка: '. $e->getMessage());
        }*/
        return $this->redirect(['user', 'contestId' => $solution->task->cid, 'userId' => $solution->uid]);
    }

    public function actionTest($id) {
        $model = Solution::findOne($id);
        echo '<pre>'. $model->json;
        exit;
    }




}
