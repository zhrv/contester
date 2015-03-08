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

class Problems extends Widget
{
    public $contest = null;


    public function run()
    {
        $tasks = Task::find()
            ->where(['cid' => $this->contest->id])
            ->orderBy('id')
            ->all();
        return $this->render('problems', ['tasks' => $tasks]);
    }
}