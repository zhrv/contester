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

        $tasksArr = [];
        $tasks = Task::find()
            ->where(['cid' => $contestId])
            ->orderBy('id')
            ->all();
        foreach ($tasks as $task) {




            $sol = Solution::find()
                ->with('tests')
                ->where(['tid' => $task->id, 'uid' => $userId])
                //->orderBy('created_at desc')
                ->limit(1)
                ->one();

            $testsArr['solution'] = $sol;
            $testsArr['tests'] = [];
            if ($sol) {
                foreach ($sol->task->checkergroups as $group) {
                    $tests = Test::find()
                        ->leftJoin('checkertests', 'checkertests.id = tests.cid')
                        ->where(['tests.sid' => $sol->id, 'checkertests.gid' => $group->id])
                        ->all();

                    $gr = [];
                    $ok = true;
                    $gr['score'] = 0;
                    $gr['tests'] = [];
                    $grScore = 0;
                    $notEmpty = false;
                    foreach ($tests as $test) {
                        $notEmpty = true;
                        $gr['tests'][] = [
                            'num' => $test->num,
                            'res' => $test->res,
                        ];
                        if ($test->res == Test::RESULT_OK) {

                            $grScore += $test->checkertest->scores;
                        } elseif ($group->method == Checkergroup::METHOD_TOTAL) {
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

                    $testsArr['tests'][] = $gr;
                }



                $tasksArr[] = [
                    'id' => $task->id,
                    'title' => $task->title,
                    'content' => $task->content,
                    'hash' => $sol->hash,
                    'tests' => $testsArr,
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

    public function actionCheck($id) {
        $solution = Solution::findOne($id);
        try {
            $tester = TesterFactory::create($solution);
            $solution->parseResult($tester->getResult());
            Yii::$app->getSession()->setFlash('success', 'Решение Решение перепроверено.');
            return $this->redirect(['user', 'contestId' => $solution->task->cid, 'userId' => $solution->uid]);
        }
        catch (Exception $e) {
            Yii::$app->getSession()->setFlash('error', 'Произошла ошибка: '. $e->getMessage());
        }
    }

    public function actionTest($id) {
        $model = Solution::findOne($id);
        echo '<pre>'. $model->json;
        exit;
    }




}
