<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 19.01.2015
 * Time: 21:01
 */

?>


<?= \yii\widgets\ListView::widget([
    'itemView' => '_contest',
    'dataProvider' => $dataProvider,
    'layout' => "{items}\n{pager}"
]); ?>