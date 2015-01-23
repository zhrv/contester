<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 11:26
 */
use \yii\helpers\Html;
use \yii\helpers\Url;
?>
<div class="panel panel-default">
    <div class="panel-heading"><?= $model->task->title ?></div>
    <!--                <div class="panel-body">-->
        <?= $this->render('_solutionTests', ['model' => $model]) ?>
    <!--                </div>-->
    <?= Html::a('Code', Url::to(['admin/solution', 'id'=>$model->id])) ?>
</div>
