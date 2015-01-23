<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\Alert;

/* @var $this yii\web\View */
$this->title = 'Главная :: Contester';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-7">
                <h2>Отправка</h2>
                <?= Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
                ]) ?>
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'task')->dropDownList($model->getActiveTasks($contest->id)) ?>
                <?= $form->field($model, 'lang')->dropDownList($model->langs) ?>
                <?= $form->field($model, 'code')->textarea(['rows' => 10]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
            </div>
            <div class="col-lg-5">
                <h2>Последние результаты</h2>

                <?= app\widgets\Result::widget(['user' => Yii::$app->user, 'contest' => $contest]) ?>


            </div>
        </div>

    </div>
</div>
