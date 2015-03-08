<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 16.12.2014
 * Time: 18:08
 */

use yii\helpers\Html;
use app\widgets\Alert;



$resTxt = [
    'ok' => 'Тест пройден',
    'bad' => 'Тест не пройден',
    'mle' => 'Лимит памяти',
    'tle' => 'Лимит времени',
    'crash' => 'Ошибка времени выполнения',
];



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
                <h3>Отчет о проверке</h3>
                <p><strong>Задача:</strong> <?= $model->task->title ?></p>
                <!--pre class="prettyprint">
                <?= \yii\helpers\Html::encode(json_encode(json_decode($model->result), JSON_PRETTY_PRINT)) ?>
                </pre-->
                <div class="panel">
                    <div class="panel-body">
                        <?php if(!isset($result->status)): ?>
                            <p class="alert alert-warning lead">Отчет отсутствует</p>
                        <?php elseif($result->status !== 'ok'): ?>
                            <p class="alert alert-warning lead"><span class="label label-danger">Ошибка:</span> <?= $result->error_msg ?></p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>№ теста</th>
                                    <th>Результат</th>
                                    <th>Баллы</th>
                                </tr>
                                <?php $num = 0; ?>
                                <?php foreach ($result->report as $test): ?>
                                    <tr<?= ($test->result !== 'ok') ? (' class="alert-danger"') : ('') ?>>
                                        <td><?= ++$num ?></td>
                                        <td><?= $resTxt[$test->result] ?></td>
                                        <td><?= $test->score ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>

                    </div>
                </div>
                <p><?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> назад', ['contest/result', 'id' => $contest->id], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-3">

                <?= app\widgets\Problems::widget(['contest' => $contest]) ?>



            </div>
        </div>

    </div>
</div>
