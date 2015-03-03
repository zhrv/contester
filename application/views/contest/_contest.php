<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 19.01.2015
 * Time: 21:03
 */
?>

    <?php if ($model->active): ?>
    <p><a href="<?= yii\helpers\Url::to(['contest/contest', 'id' => $model->id]) ?>"><span class="glyphicon glyphicon-ok"></span> <?= $model->name ?> </a></p>
    <?php else: ?>
        <p><span class="glyphicon glyphicon-remove"></span> <?= $model->name ?> </p>
    <?php endif; ?>
