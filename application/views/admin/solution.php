<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 16.12.2014
 * Time: 18:08
 */
$this->params['menu'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['admin/index']],
    ['label' => 'Участники', 'url' => ['admin/users']],
];


$this->params['breadcrumbs'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['admin/index']],
    ['label' => 'Участники ('.$model->contest->name.')', 'url' => ['admin/contest', 'id' => $model->contest->id]],
    ['label' => $model->user->name, 'url' => ['admin/contestuser', 'cid' => $model->contest->id, 'uid'=>$model->user->id]],
    ['label' => 'Решение'],
    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
];

?>
<h1>Решение задачи</h1>
<p><strong>Участник:</strong> <?= $model->user->name ?></p>
<p><strong>Турнир:</strong> <?= '' ?></p>
<p><strong>Задача:</strong> <?= $model->task->title ?></p>
<pre class="prettyprint">
<?= \yii\helpers\Html::encode($model->code) ?>
</pre>
