<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 19.01.2015
 * Time: 11:32
 */

use yii\helpers\Html;
use yii\helpers\Url;

$this->params['menu'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Задачи', 'url' => ['contest/view', 'id' => $contest->id]],
    ['label' => 'Результаты', 'url' => ['contest/users', 'id' => $contest->id]],
    ['label' => 'Хеш-коды', 'url' => ['contest/users', 'id' => $contest->id, 'action' => 'hash',]],
    //  ['label' => 'Участники ('.$contest->name.')'],
];


$this->params['breadcrumbs'] = [
    // Important: you need to specify url as 'controller/action',
    ['label' => 'Турниры', 'url' => ['contest/index']],
    ['label' => $contest->name, 'url' => ['contest/view', 'id' => $contest->id]],
    ['label' => 'Участники', 'url' => ['contest/users', 'id' => $contest->id]],
    ['label' => $user->name],
    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
];

//echo yii\widgets\ListView::widget([
//    'itemView' => '_solution',
//    'dataProvider' => $dataProvider,
//]);

$res = [
    app\models\Test::RESULT_OK      => '<strong style="color:green">+</strong>',
    app\models\Test::RESULT_MLE     => '<strong style="color:red">-</strong>',
    app\models\Test::RESULT_TLE     => '<strong style="color:red">-</strong>',
    app\models\Test::RESULT_CRASH   => '<strong style="color:red">-</strong>',
    app\models\Test::RESULT_BAD     => '<strong style="color:red">-</strong>',
];

$badAnswers =[
    'bad' => 'Ошибка компиляции',
    'in_queue' => 'Ожидает проверки',
    'error' => 'Произошла ошибка при проверке',
];

foreach ($tasks as $task) {
    $result ="";
    if ($task['status'] != "ok") {
        $result .= '<div class="panel panel-default"><div class="panel-heading"><h4>' . $task['title'] . '</h4></div>';
        $result .= '<div class="panel-body">';
        $result .= '<p>'. $badAnswers[$task['status']] .'</p>';
        $result .= '</div>';
        $result .= '<div class="panel-footer">';
        $result .= Html::a('Решение', Url::to(['contest/solution', 'id' => $task['tests']['solution']->id]), ['class' => 'btn btn-success']) . '&nbsp;';
        $result .= Html::a('Результат проверки', Url::to(['contest/json', 'id' => $task['tests']['solution']->id]), ['class' => 'btn btn-success']) . '&nbsp;';
        $result .= Html::a('Параметры', Url::to(['contest/config', 'id' => $task['tests']['solution']->id]), ['class' => 'btn btn-primary']) . '&nbsp;';
        $result .= Html::a('Перепроверить', Url::to(['contest/check', 'id' => $task['tests']['solution']->id]), ['class' => 'btn btn-danger']);
        $result .= '</div></div>';
    } else {
        $row1 = '<th>Подзадачи</th>';
        $row2 = '<th>Тесты</th>';
        $row3 = '<th>Результаты</th>';
        $row4 = '<th>Баллы</th>';

        $i = 0;
        $totalScore = 0;
        $testCnt = 0;
        foreach ($task['tests']['tests'] as $group) {
            $cnt = 0;
            $i++;
            foreach ($group['tests'] as $test) {
                $testCnt++;
                $cnt++;
                $row2 .= '<th align="center">' . $test['num'] . '</th>';
                $row3 .= '<td align="center">' . $res[$test['res']] . '</td>';
            }
            $row1 .= '<td align="center" colspan="' . $cnt . '">' . $i . '</td>';
            $row4 .= '<td align="center" colspan="' . $cnt . '">' . $group['score'] . '</td>';
            $totalScore += $group['score'];
        }
        $result = '<div class="panel panel-default"><div class="panel-heading"><h4>' . $task['title'] . '</h4></div>';
        $result .= '<div class="panel-body"><table class="table-bordered">';
        $result .= '<tr>' . $row1 . '</tr>';
        $result .= '<tr>' . $row2 . '</tr>';
        $result .= '<tr>' . $row3 . '</tr>';
        $result .= '<tr>' . $row4 . '</tr>';
        $result .= "<tr><th>ИТОГО</th><td align=\"center\" colspan=\"{$testCnt}\"><strong style=\"color:green; font-size:1.5em;\">{$totalScore}</strong></td></tr>";
        $result .= "<tr><th>hash</th><td align=\"center\" colspan=\"{$testCnt}\">{$task['hash']}</td><tr>";
        $result .= '</table></div>';
        $result .= '<div class="panel-footer">';
        $result .= Html::a('Решение', Url::to(['contest/solution', 'id' => $task['tests']['solution']->id]), ['class' => 'btn btn-success']) . '&nbsp;';
        $result .= Html::a('Результат проверки', Url::to(['contest/json', 'id' => $task['tests']['solution']->id]), ['class' => 'btn btn-success']) . '&nbsp;';
        $result .= Html::a('Параметры', Url::to(['contest/config', 'id' => $task['tests']['solution']->id]), ['class' => 'btn btn-primary']) . '&nbsp;';
        $result .= Html::a('Перепроверить', Url::to(['contest/check', 'id' => $task['tests']['solution']->id]), ['class' => 'btn btn-danger']);
        $result .= '</div></div>';
    }
    echo $result;
}