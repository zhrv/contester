<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Checkertest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="checkertest-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'tid')->hiddenInput(['value' => $task->id]) ?>


    <?= $form->field($model, 'gid')->dropDownList($task->checkerGroupsArray) ?>

    <?= $form->field($model, 'scores')->textInput() ?>

    <?= $form->field($model, 'infile')->fileInput() ?>

    <?= $form->field($model, 'outfile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
