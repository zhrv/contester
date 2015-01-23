<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 19.01.2015
 * Time: 21:03
 */
?>
<div>
    <?php if ($model->active): ?>
    <a href="<?= yii\helpers\Url::to(['contest/contest', 'id' => $model->id]) ?>"><?= $model->name ?></a>
    <?php else: ?>
        <?= $model->name ?>
    <?php endif; ?>
</div>