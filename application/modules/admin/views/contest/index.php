<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Турниры';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [];

?>
<div class="contest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Contest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'start_at',
            'finish_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
