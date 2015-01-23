<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = 'Create Task';
$this->params['breadcrumbs'][] = ['label' => 'Турнир', 'url' => ['contest/view', 'id' => $contest->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'contest' => $contest,
    ]) ?>

</div>
