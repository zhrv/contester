<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 22.02.2015
 * Time: 23:04
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Условия задач</h4>
    </div>
    <ul class="list-group">
    <?php foreach ($tasks as $task): ?>
        <li class="list-group-item"><?= \yii\helpers\Html::a('<span class="glyphicon glyphicon-cloud-download"></span>&nbsp;&nbsp;'. $task->title, ['']) ?></li>
    <?php endforeach; ?>
    </ul>
</div>
