<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <!--?= $form->field($model, 'start_at')->textInput() ?-->
    <!--?= dosamigos\datetimepicker\DateTimePicker::widget([
        'model' => $model,
        'attribute' => 'start_at',
    ]) ?-->

    <!--?= dosamigos\datetimepicker\DateTimePicker::widget([
        'model' => $model,
        'attribute' => 'finish_at',
    ]) ?-->

    <?= $form->field($model, 'start_at')->textInput() ?>
    <?= $form->field($model, 'finish_at')->textInput() ?>
    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
