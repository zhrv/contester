<?php

use \app\models\Test;

    $res = [
        app\models\Test::RESULT_OK      => '<strong style="color:green">+</strong>',
        app\models\Test::RESULT_MLE     => '<strong style="color:red">-</strong>',
        app\models\Test::RESULT_TLE     => '<strong style="color:red">-</strong>',
        app\models\Test::RESULT_CRASH   => '<strong style="color:red">-</strong>',
        app\models\Test::RESULT_BAD     => '<strong style="color:red">-</strong>',

    ];  /*
?>
    <?php foreach ($tasks as $task): ?>
        <?php if (!empty($task['tests'])): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><h4><?= $task['title'] ?></h4></div>
                <?php $i = 0; $totalScore = 0; ?>

                <?php foreach ($task['tests'] as $group): ?>
                    <br/><strong>Подзадача № <?= ++$i ?></strong>
                    <table class="table-bordered">
                        <tr>
                            <th>Номер теста</th>
                            <?php foreach ($group['tests'] as $test): ?>
                                <th align="center"><?= $test['num'] ?></th>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <th>Результат</th>
                            <?php $ok = 0; $err = 0; ?>
                            <?php foreach ($group['tests'] as $test): ?>
                                <?php
                                    if ($test['res'] == Test::RESULT_OK) {
                                        ++$ok;
                                    } else {
                                        ++$err;
                                    }
                                ?>
                                <td align="center"><?= $res[$test['res']] ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <th>Баллы</th><td align="center" colspan="<?= $ok+$err ?>"><?= $group['score'] ?></td>
                        </tr>

                    </table>
                    <?php $totalScore += $group['score']; ?>
                <?php endforeach; ?>
                <br/>
                <table class="table-bordered">
                    <tr>
                        <th>ИТОГО БАЛЛОВ</th><td align="center" colspan="<?= $ok+$err ?>"><strong style="color:green;font-size:1.5em;"><?= $totalScore ?></strong></td>
                    </tr>
                    <tr>
                        <th>Хеш-код (md5): </th><td align="center" colspan="<?= $ok+$err ?>"><?= $task['hash'] ?></td>
                    </tr>
                </table>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach;  ?>


<?php

*/

foreach ($tasks as $task) {
    $row1 = '<th>Подзадачи</th>';
    $row2 = '<th>Тесты</th>';
    $row3 = '<th>Результаты</th>';
    $row4 = '<th>Баллы</th>';

    $i = 0;
    $totalScore = 0;
    $testCnt = 0;
    foreach ($task['tests'] as $group) {
        $cnt = 0;
        $i++;
        foreach ($group['tests'] as $test) {
            $testCnt++;
            $cnt++;
            $row2 .= '<th align="center">'. $test['num'] .'</th>';
            $row3 .= '<td align="center">'. $res[$test['res']] .'</td>';
        }
        $row1 .= '<td align="center" colspan="'. $cnt .'">'. $i .'</td>';
        $row4 .= '<td align="center" colspan="'. $cnt .'">'. $group['score'] .'</td>';
        $totalScore += $group['score'];
    }
    $result = '<div class="panel panel-default"><div class="panel-heading"><h4>'. $task['title'] .'</h4></div><div class="panel-body">';
    $result .= '<table class="table-bordered">';
    $result .= '<tr>'. $row1 .'</tr>';
    $result .= '<tr>'. $row2 .'</tr>';
    $result .= '<tr>'. $row3 .'</tr>';
    $result .= '<tr>'. $row4 .'</tr>';
    $result .= "<tr><th>ИТОГО</th><td align=\"center\" colspan=\"{$testCnt}\"><strong style=\"color:green; font-size:1.5em;\">{$totalScore}</strong></td></tr>";
    $result .= "<tr><th>hash</th><td align=\"center\" colspan=\"{$testCnt}\">{$task['hash']}</td><tr>";
    $result .= '</table></div></div>';
    $result .= '';
    echo $result;
}

?>
