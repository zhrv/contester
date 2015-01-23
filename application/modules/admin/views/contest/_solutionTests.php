<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 12:25
 */
$res = [
    app\models\Test::RESULT_OK      => '<strong style="color:green">+</strong>',
    app\models\Test::RESULT_MLE     => '<strong style="color:red">-</strong>',
    app\models\Test::RESULT_TLE     => '<strong style="color:red">-</strong>',
    app\models\Test::RESULT_CRASH   => '<strong style="color:red">-</strong>',
    app\models\Test::RESULT_BAD     => '<strong style="color:red">-</strong>',
];

echo app\widgets\Result::widget(['user' => Yii::$app->user, 'contest' => $model->task->contest]);
?>
