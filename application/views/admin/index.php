<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 16.12.2014
 * Time: 13:55
 */


$this->params['menu'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['admin/index']],
    ['label' => 'Участники', 'url' => ['admin/users']],
];

$this->params['breadcrumbs'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры'],
];
?>
<h1>Турниры</h1>
<?= yii\widgets\ListView::widget([
    'itemView' => '_contest',
    'dataProvider' => $dataProvider,
]); ?>