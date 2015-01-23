<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.01.2015
 * Time: 13:35
 */

use \yii\grid\GridView;
use \yii\grid\DataColumn;
use \yii\helpers\Html;

$this->params['menu'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Результаты', 'url' => ['admin/contest', 'id' => $contest->id]],
    ['label' => 'Хеш-коды', 'url' => ['admin/contest', 'id' => $contest->id, 'action' => 'hash',]],
    //  ['label' => 'Участники ('.$contest->name.')'],
];


$this->params['breadcrumbs'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['admin/index']],
    ['label' => 'Участники ('. $contest->name .')'],
    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
];

//$this->params['contest'] = $contest;
//
//
//echo \yii\widgets\ListView::widget([
//    'dataProvider' => $dataProvider,
//    'itemView' => '_contestUser',
//]);

?>

<table class="table-bordered">
    <tr>
        <th rowspan="2">Имя</th>
        <?php foreach ($tasks as $task): ?>
            <th colspan="2"><?= $task ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($tasks as $task): ?>
            <th> OK </th><th> BAD </th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= Html::a($user->name, ['admin/contestuser', 'cid' => $contest->id, 'uid' => $user->id]) ?></td>
            <?php foreach ($tasks as $tid => $task): ?>
                <?php if ($s = $user->getSolutionByTask($tid)): ?>
                    <td><?= $s->goodTestsCount ?></td>
                    <td><?= $s->badTestsCount ?></td>
                <?php else: ?>
                    <td>0</td>
                    <td>0</td>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>