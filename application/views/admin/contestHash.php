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
    ['label' => 'Хеш-коды',   'url' => ['admin/contest', 'id' => $contest->id, 'action' => 'hash',]],
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
        <th>Имя</th>
        <?php foreach ($tasks as $task): ?>
            <th><?= $task ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= Html::a($user->name, ['admin/contestuser', 'cid' => $contest->id, 'uid' => $user->id]) ?></td>
            <?php foreach ($tasks as $tid => $task): ?>
                <td><?= $user->getSolutionHashByTask($tid)  ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>