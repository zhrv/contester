<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 24.01.2015
 * Time: 22:45
 */

$this->params['menu'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Задачи', 'url' => ['contest/view', 'id' => $model->contest->id]],
    ['label' => 'Результаты', 'url' => ['contest/users', 'id' => $model->contest->id]],
    ['label' => 'Хеш-коды', 'url' => ['contest/users', 'id' => $model->contest->id, 'action' => 'hash',]],
    //  ['label' => 'Участники ('.$contest->name.')'],
];


$this->params['breadcrumbs'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['contest/index']],
    ['label' => $model->contest->name, 'url' => ['contest/view', 'id' => $model->contest->id]],
    ['label' => 'Участники', 'url' => ['contest/users', 'id' => $model->contest->id]],
    ['label' => $model->user->name, 'url' => ['contest/user', 'contestId' => $model->contest->id, 'userId' => $model->user->id]],
    ['label' => 'Результат проверки'],
    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
];

?>
<h1>Результат проверки (JSON)</h1>
<p><strong>Участник:</strong> <?= $model->user->name ?></p>
<p><strong>Турнир:</strong> <?= $model->contest->name ?></p>
<p><strong>Задача:</strong> <?= $model->task->title ?></p>
<pre class="prettyprint">
<?= \yii\helpers\Html::encode(json_encode(json_decode($model->result), JSON_PRETTY_PRINT)) ?>
</pre>
