<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 18.01.2015
 * Time: 14:17
 */
use \yii\helpers\Html;


$this->params['menu'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Задачи', 'url' => ['contest/view', 'id' => $contest->id]],
    ['label' => 'Результаты', 'url' => ['contest/users', 'id' => $contest->id]],
    ['label' => 'Хеш-коды'],
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

<table class="table table-bordered">
    <tr>
        <th>Имя</th>
        <?php foreach ($tasks as $task): ?>
            <th><?= $task ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <?php if ($layout !== 'print'): ?>
                    <?= Html::a($user->name, ['contest/user', 'contestId' => $contest->id, 'userId' => $user->id]) ?>
                <?php else: ?>
                    <?= $user->name ?>
                <?php endif; ?>
            </td>
            <?php foreach ($tasks as $tid => $task): ?>
                <td><?= $user->getSolutionHashByTask($tid)  ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>


<?php if ($layout !== 'print'): ?>
    <?= Html::a('Версия для печати', ['contest/users', 'id' => $contest->id, 'action' => 'hash', 'print' => 1]) ?>
<?php endif; ?>
