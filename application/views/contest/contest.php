<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\Alert;

/* @var $this yii\web\View */
$this->title = 'Главная :: Contester';
?>
<div class="site-index">

    <div class="body-content">
        <h2><?= $contest->name ?></h2>
        <div class="row">
            <div class="col-lg-9">

                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation" class="active"><?= Html::a('<span class="glyphicon glyphicon-cloud-upload"></span> Отправить решение', ['contest/contest', 'id' => $contest->id], ['class' => 'h4']) ?></li>
                    <li role="presentation"><?= Html::a('<span class="glyphicon glyphicon-list-alt"></span> Результаты', ['contest/result', 'id' => $contest->id], ['class' => 'h4']) ?></li>
                </ul>
                <p></p><p></p>
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
            <div class="col-lg-3">

                <?= app\widgets\Problems::widget(['contest' => $contest]) ?>

                <!--div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Последние результаты</h4>
                    </div>
                    <div class="panel-body">
                        <?= app\widgets\Result::widget(['user' => Yii::$app->user, 'contest' => $contest]) ?>
                    </div>
                </div-->


            </div>
        </div>

    </div>
</div>
