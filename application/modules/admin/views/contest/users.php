<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 18.01.2015
 * Time: 14:05
 */

use \yii\helpers\Html;

$this->params['menu'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Задачи', 'url' => ['contest/view', 'id' => $contest->id]],
    ['label' => 'Результаты'],
    ['label' => 'Хеш-коды', 'url' => ['contest/users', 'id' => $contest->id, 'action' => 'hash',]],
    //  ['label' => 'Участники ('.$contest->name.')'],
];


$this->params['breadcrumbs'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['contest/index']],
    ['label' => $contest->name, 'url' => ['contest/view', 'id' => $contest->id]],
    ['label' => 'Участники'],
    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
];

?>
<?php /*
<table class="table table-bordered">
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
            <td><?= Html::a($user->name, ['contest/user', 'contestId' => $contest->id, 'userId' => $user->id]) ?></td>
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
</table> */?>
<table class="table table-bordered">
    <tr>
        <th>№<?php $i = 0; ?></th>
        <th>Имя</th>
        <?php foreach ($tasks as $task): ?>
            <th><?= $task ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= ++$i ?></td>
            <td>
                <?php if ($layout !== 'print'): ?>
                    <?= Html::a($user->name, ['contest/user', 'contestId' => $contest->id, 'userId' => $user->id]) ?>
                <?php else: ?>
                    <?= $user->name ?>
                <?php endif; ?>
            </td>
            <?php foreach ($tasks as $tid => $task): ?>
                <?php if ($s = $user->getSolutionByTask($tid)): ?>
                    <td><?= $s->score ?></td>
                <?php else: ?>
                    <td>0</td>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>


<?php if ($layout !== 'print'): ?>
    <?= Html::a('Версия для печати', ['contest/users', 'id' => $contest->id, 'print' => 1]) ?>
<?php endif; ?>
