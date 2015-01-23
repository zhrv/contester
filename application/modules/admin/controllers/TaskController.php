<?php

namespace app\modules\admin\controllers;

use app\models\Contest;
use Yii;
use app\models\Task;
use app\models\Checkertest;
use app\models\Checkergroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
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
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $testsProvider = new ActiveDataProvider([
            'query' => Checkertest::find()
                ->where(['checkergroups.tid' => $id])
                ->leftJoin('checkergroups', 'checkergroups.id = checkertests.gid')
            ,
        ]);

        $groupsProvider = new ActiveDataProvider([
            'query' => Checkergroup::find()
                ->where(['tid' => $id]),
        ]);

        return $this->render('view', [
            'model' => $model,
            'testsProvider' => $testsProvider,
            'groupsProvider' => $groupsProvider,
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($contestId)
    {
        $contest = Contest::findOne(['id' => $contestId]);
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate() && $model->file) {
                $dir = $model->getTestsDir();
                if (!(file_exists($dir) && is_dir($dir))) {
                    mkdir($dir, 0777, true);
                }
                $name = $model->file->baseName . (!empty($model->file->extension) ? ('.' . $model->file->extension) : '');
                if (!empty($model->checker) && file_exists($dir . '/' . $model->checker)) //@todo возможно затереть файл другой задачи, ИСПРАВИТЬ!!!
                    unlink($dir . '/' . $model->checker);
                $model->file->saveAs($dir .'/'. $name);
                $model->checker = $name;
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            //return $this->redirect(['view', 'id' => $model->id]);
        } //else {
            return $this->render('create', [
                'model' => $model,
                'contest' => $contest,
            ]);
       // }
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate() && $model->file) {
                $dir = $model->getTestsDir();
                if (!(file_exists($dir) && is_dir($dir))) {
                    mkdir($dir, 0777, true);
                }
                $name = $model->file->baseName . (!empty($model->file->extension) ? ('.' . $model->file->extension) : '');
                if (!empty($model->checker) && file_exists($dir . '/' . $model->checker))
                    unlink($dir . '/' . $model->checker);
                $model->file->saveAs($dir .'/'. $name);
                $model->checker = $name;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'contest' => $model->contest,
        ]);
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $contest = $model->contest;
        $model->delete();

        return $this->redirect(['contest/view', 'id' => $contest->id]);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
