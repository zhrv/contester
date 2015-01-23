<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->title;
$this->params['menu'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Задачи'],
    ['label' => 'Результаты', 'url' => ['contest/users', 'id' => $model->contest->id]],
    ['label' => 'Хеш-коды', 'url' => ['contest/users', 'id' => $model->contest->id, 'action' => 'hash',]],
    //  ['label' => 'Участники ('.$contest->name.')'],
];


$this->params['breadcrumbs'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['contest/index']],
    ['label' => $model->contest->name, 'url' => ['contest/view', 'id' => $model->contest->id]],
    ['label' => 'Задачи'],
    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
];
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cid',
            'title',
            'content:ntext',
        ],
    ]) ?>

    <h2>Подзадачи</h2>

    <?= GridView::widget([
        'dataProvider' => $groupsProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => 'Название',
            ],

            [
                'attribute' => 'method',
                'label' => 'Метод оценивания',
                'content' => function ($model, $key, $index, $column) {
                    return $model->scoreCalcMethods[$model->method];
                },
                //'value' => 'getScoreCalcMethods()[$data->method]',
            ],
            //'output',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'checkergroup',
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Создать подзадачу', ['checkergroup/create', 'taskId' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>


    <h2>Тесты</h2>

    <?= GridView::widget([
        'dataProvider' => $testsProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'gid',
                'label' => 'Подзадача',
                'content' => function ($model, $key, $index, $column) {
                    return $model->checkergroup->name;
                },
                //'value' => 'getScoreCalcMethods()[$data->method]',
            ],
            'input',
            'output',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'checkertest',
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Создать тест', ['checkertest/create', 'taskId' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>


</div>
