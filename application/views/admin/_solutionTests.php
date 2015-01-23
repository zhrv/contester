<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 12:25
 */
$res = [
    app\models\Test::RESULT_OK      => '<strong style="color:green">+</strong>',
    app\models\Test::RESULT_ERR     => '<strong style="color:red">-</strong>',
];
$tests = $model->tests;
?>
<table class="table-bordered">
    <tr>
        <th>Номер теста</th>
        <?php foreach ($tests as $test): ?>
            <th align="center"><?= $test->num ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <th>Результат</th>
        <?php $ok = 0; $err = 0; ?>
        <?php foreach ($tests as $test): ?>
            <?php
            if ($test->res) {
                ++$ok;
            } else {
                ++$err;
            }
            ?>
            <td align="center"><?= $res[$test->res] ?></td>
        <?php endforeach; ?>
    </tr>
    <tr>
        <th>Пройдено</th><td align="center" colspan="<?= $ok+$err ?>"><?= $ok ?></td>
    </tr>
    <tr>
        <th>Не пройдено</th><td align="center" colspan="<?= $ok+$err ?>"><?= $err ?></td>
    </tr>
    <tr>
        <th>Хеш-код (md5): </th><td align="center" colspan="<?= $ok+$err ?>"><?= $model->hash ?></td>
    </tr>
</table>