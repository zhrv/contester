<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Checkertests';
$this->params['breadcrumbs'][] = ['label' => $task->title, 'url' => ['task/view', 'id'=>$task->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkertest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Checkertest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tid',
            'scores',
            'input',
            'output',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
