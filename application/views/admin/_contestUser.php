<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 1:03
 */
?>
<div>
    <a href="<?= yii\helpers\Url::to(['admin/contestuser', 'cid'=>$this->params['contest']->id, 'uid' => $model->id]) ?>"><?= $model->name ?></a>
</div>