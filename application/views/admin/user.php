<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 0:59
 */

$this->params['menu'] = [];


$this->params['breadcrumbs'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['admin/index']],
    ['label' => 'Участники', 'url' => ['admin/contest', 'id' => $contest->id]],
    ['label' => $user->name],
    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
];


echo yii\widgets\ListView::widget([
    'itemView' => '_solution',
    'dataProvider' => $dataProvider,
]);