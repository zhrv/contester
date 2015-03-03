<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\Alert;
use \app\models\Test;

$res = [
    app\models\Test::RESULT_OK      => '<strong style="color:green">+</strong>',
    app\models\Test::RESULT_MLE     => '<strong style="color:red">-</strong>',
    app\models\Test::RESULT_TLE     => '<strong style="color:red">-</strong>',
    app\models\Test::RESULT_CRASH   => '<strong style="color:red">-</strong>',
    app\models\Test::RESULT_BAD     => '<strong style="color:red">-</strong>',

];

/* @var $this yii\web\View */
$this->title = 'Результаты';
?>
<div class="site-index">

    <div class="body-content">
        <h2><?= $contest->name ?></h2>
        <div class="row">
            <div class="col-lg-9">

                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation"><?= Html::a('<span class="glyphicon glyphicon-cloud-upload"></span> Отослать', ['contest/contest', 'id' => $contest->id], ['class' => 'h4']) ?></li>
                    <li role="presentation" class="active"><?= Html::a('<span class="glyphicon glyphicon-list-alt"></span> Результаты', ['contest/result', 'id' => $contest->id], ['class' => 'h4']) ?></li>
                </ul>
                <p></p><p></p>
                <?= Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
                ]) ?>

                <?php

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
                    $result = '<h3>'. $task['title'] .'</h3>';
                    $result .= '<table class="table table-bordered">';
                    $result .= "<tr><th>Hash-код</th><td colspan=\"{$testCnt}\">{$task['hash']}</td></tr>";
                    $result .= '<tr>'. $row1 .'</tr>';
                    $result .= '<tr>'. $row2 .'</tr>';
                    $result .= '<tr>'. $row3 .'</tr>';
                    $result .= '<tr>'. $row4 .'</tr>';
                    $result .= "<tr><th>ИТОГО</th><td colspan=\"{$testCnt}\"><strong style=\"color:green; font-size:1.5em;\">{$totalScore}</strong></td></tr>";
                    $result .= '<tr><td colspan="'. ($testCnt+1) .'">'.
                        Html::a('Решение', ['contest/solution', 'id' => $task['solution']->id], ['class' => 'btn btn-primary']) .' '.
                        Html::a('Отчет', ['contest/report', 'id' => $task['solution']->id], ['class' => 'btn btn-success']) .
                        '</td><tr>';
                    $result .= '</table>';
                    $result .= '';
                    echo $result;
                }

                ?>

                <!--?= app\widgets\Result::widget(['user' => Yii::$app->user, 'contest' => $contest]) ?-->



            </div>
            <div class="col-lg-3">

                <?= app\widgets\Problems::widget(['contest' => $contest]) ?>



            </div>
        </div>

    </div>
</div>
