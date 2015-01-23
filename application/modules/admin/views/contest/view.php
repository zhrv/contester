<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Contest */

$this->title = $model->name;
$this->params['menu'] = [
    ['label' => 'Задачи'],
    ['label' => 'Результаты', 'url' => ['contest/users', 'id' => $model->id]],
    ['label' => 'Хеш-коды', 'url' => ['contest/users', 'id' => $model->id, 'action' => 'hash',]],
];


$this->params['breadcrumbs'] = [
    ['label' => 'Турниры', 'url' => ['contest/index']],
    ['label' => $model->name],
];
?>
<div class="contest-view">

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
            'name',
            'start_at',
            'finish_at',
        ],
    ]) ?>

    <h2>Задачи</h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'task',
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Создать задачу', ['task/create', 'contestId' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

</div>
