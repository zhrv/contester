<?php

namespace app\modules\admin\controllers;

use app\models\Task;
use Yii;
use app\models\Checkertest;
use app\models\Checkergroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * CheckertestController implements the CRUD actions for Checkertest model.
 */
class CheckertestController extends Controller
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
//     * Lists all Checkertest models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Checkertest::find(),
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    /**
     * Displays a single Checkertest model.
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
     * Creates a new Checkertest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($taskId)
    {
        $task = Task::findOne(['id' => $taskId]);
        $model = new Checkertest();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->infile = UploadedFile::getInstance($model, 'infile');
            $model->outfile = UploadedFile::getInstance($model, 'outfile');
            if ($model->validate()) {
                if ($model->infile) {
                    $dir = $task->getTestsDir();
                    if (!(file_exists($dir) && is_dir($dir))) {
                        mkdir($dir, 0777, true);
                    }
                    $name = $model->infile->baseName . (!empty($model->infile->extension) ? ('.' . $model->infile->extension) : '');
                    $model->infile->saveAs($dir . '/' . $name);
                    $model->input = $name;
                }
                if ($model->outfile) {
                    $dir = $task->getTestsDir();
                    if (!(file_exists($dir) && is_dir($dir))) {
                        mkdir($dir, 0777, true);
                    }
                    $name = $model->outfile->baseName . ((!empty($model->outfile->extension)) ? ('.' . $model->outfile->extension) : '');
                    $model->outfile->saveAs($dir . '/' . $name);
                    $model->output = $name;
                }
            }

            if ($model->save()) {
                return $this->redirect(['task/view', 'id' => $task->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
            'task' => $task,
        ]);

    }

    /**
     * Updates an existing Checkertest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //$task = $model->task;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $task = Checkergroup::findOne(['id' => $model->gid])->task;
            $model->infile = UploadedFile::getInstance($model, 'infile');
            $model->outfile = UploadedFile::getInstance($model, 'outfile');
            //echo '<pre>';
            //print_r($model); exit;
            if ($model->validate()) {
                if ($model->infile) {
                    $dir = $task->getTestsDir();
                    if (!(file_exists($dir) && is_dir($dir))) {
                        mkdir($dir, 0777, true);
                    }
                    $name = $model->infile->baseName . (!empty($model->infile->extension) ? ('.' . $model->infile->extension) : '');
                    $model->infile->saveAs($dir . '/' . $name);
                    if (file_exists($dir . '/' . $model->input)) //@todo возможно затереть файл другой задачи, ИСПРАВИТЬ!!!
                        unlink($dir . '/' . $model->input);
                    $model->input = $name;
                }
                if ($model->outfile) {
                    $dir = $task->getTestsDir();
                    if (!(file_exists($dir) && is_dir($dir))) {
                        mkdir($dir, 0777, true);
                    }
                    $name = $model->outfile->baseName . ((!empty($model->outfile->extension)) ? ('.' . $model->outfile->extension) : '');
                    $model->outfile->saveAs($dir . '/' . $name);
                    if (file_exists($dir . '/' . $model->output)) //@todo возможно затереть файл другой задачи, ИСПРАВИТЬ!!!
                        unlink($dir . '/' . $model->output);
                    $model->output = $name;
                }
            }

            if ($model->save()) {
                return $this->redirect(['task/view', 'id' => $task->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'task' => $model->task,
        ]);

    }

    /**
     * Deletes an existing Checkertest model.
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
     * Finds the Checkertest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Checkertest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Checkertest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
