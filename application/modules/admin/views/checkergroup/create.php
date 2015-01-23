<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Checkergroup */

$this->title = 'Create Checkergroup';
$this->params['breadcrumbs'][] = ['label' => $task->title, 'url' => ['task/view', 'id'=>$task->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkergroup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'task' => $task,
    ]) ?>

</div>
