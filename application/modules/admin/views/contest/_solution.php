<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 11:26
 */
use \yii\helpers\Html;
use \yii\helpers\Url;


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
    $result = '<div class="panel panel-default"><div class="panel-heading"><h4>'. $task['title'] .'</h4></div>';
    $result .= '<table class="table-bordered">';
    $result .= '<tr>'. $row1 .'</tr>';
    $result .= '<tr>'. $row2 .'</tr>';
    $result .= '<tr>'. $row3 .'</tr>';
    $result .= '<tr>'. $row4 .'</tr>';
    $result .= "<tr><th>ИТОГО</th><td align=\"center\" colspan=\"{$testCnt}\"><strong style=\"color:green; font-size:1.5em;\">{$totalScore}</strong></td></tr>";
    $result .= "<tr><th>hash</th><td align=\"center\" colspan=\"{$testCnt}\">{$task['hash']}</td><tr>";
    $result .= '</table>';
    $result .= '<p>'.Html::a('Исходный код решения', Url::to(['contest/solution', 'id'=>$model->id])).'</p>';
    $result .='</div>';
    echo $result;
}



?>


