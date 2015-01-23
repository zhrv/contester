<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 15.12.2014
 * Time: 1:27
 */

namespace app\widgets;

use app\models\Solution;
use app\models\Task;
use app\models\Test;
use app\models\Checkergroup;
use yii\base\Widget;
use yii\helpers\Html;

class Result extends Widget
{
    public $user = null;
    public $contest = null;

    public function init()
    {
        parent::init();
        if ($this->user === null) {
            $this->user = Yii::$app->user;
        }
    }

    public function run()
    {
        $tasksArr = [];
        $tasks = Task::find()
            ->where(['cid' => $this->contest->id])
            ->orderBy('id')
            ->all();
        foreach ($tasks as $task) {




            $sol = Solution::find()
                ->with('tests')
                ->where(['tid' => $task->id, 'uid' => $this->user->id])
                //->orderBy('created_at desc')
                ->limit(1)
                ->one();

            $testsArr = [];
            if ($sol) {
                foreach ($sol->task->checkergroups as $group) {
                    $tests = Test::find()
                        ->leftJoin('checkertests', 'checkertests.id = tests.cid')
                        ->where(['tests.sid' => $sol->id, 'checkertests.gid' => $group->id])
                        ->all();

                    $gr = [];
                    $ok = true;
                    $notEmpty = false;
                    $gr['tests'] = [];
                    $gr['score'] = 0;
                    $grScore = 0;
                    foreach ($tests as $test) {
                        $notEmpty = true;
                        $gr['tests'][] = [
                            'num' => $test->num,
                            'res' => $test->res,
                        ];
                        if ($test->res == Test::RESULT_OK) {

                            $grScore += $test->checkertest->scores;
                        } elseif ($test->checkertest->checkergroup->method == Checkergroup::METHOD_TOTAL) {
                            $ok = false;
                            //break;
                        }
                    }
                    if ($ok && $notEmpty) {
                        if ($group->method == Checkergroup::METHOD_TOTAL) {
                            $gr['score'] = $group->scores;
                        }
                        else {
                            $gr['score'] = $grScore;
                        }
                    }
                    //$gr['score'] = $ok ? $grScore : 0;

                    $testsArr[] = $gr;
                }



                $tasksArr[] = [
                    'id' => $task->id,
                    'title' => $task->title,
                    'content' => $task->content,
                    'hash' => $sol->hash,
                    'tests' => $testsArr,
                ];
            }

        }
        return $this->render('result', ['tasks' => $tasksArr]);
    }
}