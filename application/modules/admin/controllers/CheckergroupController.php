<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Task;
use app\models\Checkergroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckergroupController implements the CRUD actions for Checkergroup model.
 */
class CheckergroupController extends Controller
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

//    /**
//     * Lists all Checkergroup models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Checkergroup::find(),
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    /**
     * Displays a single Checkergroup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $task = Task::findOne(['id' => $model->task->id]);
        return $this->render('view', [
            'model' => $model,
            'task' => $task,
        ]);
    }

    /**
     * Creates a new Checkergroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($taskId)
    {
        $task = Task::findOne(['id' => $taskId]);
        $model = new Checkergroup();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['task/view', 'id' => $task->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'task' => $task,
            ]);
        }
    }

    /**
     * Updates an existing Checkergroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $task = Task::findOne(['id' => $model->task->id]);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['task/view', 'id' => $task->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'task' => $task,
            ]);
        }
    }

    /**
     * Deletes an existing Checkergroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $task = Task::findOne(['id' => $model->task->id]);
        $model->delete();


        return $this->redirect(['task/view', 'id' => $task->id]);
    }

    /**
     * Finds the Checkergroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Checkergroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Checkergroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
