<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 16.12.2014
 * Time: 18:08
 */

use yii\helpers\Html;
use app\widgets\Alert;


$this->title = 'Результаты';
?>
<div class="site-index">

    <div class="body-content">
        <h2><?= $contest->name ?></h2>
        <div class="row">
            <div class="col-lg-9">

                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation"><?= Html::a('<span class="glyphicon glyphicon-cloud-upload"></span> Отослать', ['contest/contest', 'id' => $contest->id], ['class' => 'h4']) ?></li>
                    <li role="presentation" class="active"><?= Html::a('<span class="glyphicon glyphicon-list-alt"></span> Результаты', ['contest/result', 'id' => $contest->id], ['class' => 'h4']) ?></li>
                </ul>
                <p></p><p></p>
                <?= Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
                ]) ?>
                <h3>Решение задачи</h3>
                <p><strong>Задача:</strong> <?= $model->task->title ?></p>
                <pre class="prettyprint">
                <?= \yii\helpers\Html::encode($model->code) ?>
                </pre>
                <p><?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> назад', ['contest/result', 'id' => $contest->id], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-3">

                <?= app\widgets\Problems::widget(['contest' => $contest]) ?>



            </div>
        </div>

    </div>
</div>
