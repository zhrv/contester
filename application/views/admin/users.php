<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 0:59
 */

$this->params['menu'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['admin/index']],
    ['label' => 'Участники', 'url' => ['admin/users']],
];


$this->params['breadcrumbs'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['admin/index']],
    ['label' => 'Участники'],
    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
];


echo yii\widgets\ListView::widget([
    'itemView' => '_user',
    'dataProvider' => $dataProvider,
]);