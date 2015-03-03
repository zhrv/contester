<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 19.01.2015
 * Time: 21:01
 */

?>

<div class="jumbotron text-left">
    <h1>Текущие турниры</h1>
    <?= \yii\widgets\ListView::widget([
        'itemView' => '_contest',
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}"
    ]); ?>
</div>
