<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Пользователь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <!--p>Please fill out the following fields to login:</p-->

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'passwordRe')->passwordInput() ?>
    <?= $form->field($model, 'surname') ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'patronymic') ?>
    <?= $form->field($model, 'neighborhood') ?>
    <?= $form->field($model, 'school') ?>
    <?= $form->field($model, 'class') ?>
    <?= $form->field($model, 'teacher') ?>

    <!--?= $form->field($model, 'rememberMe', [
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->checkbox() ?-->

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Заргистрироваться', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>


</div>
