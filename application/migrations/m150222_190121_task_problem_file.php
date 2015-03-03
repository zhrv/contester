<?php

use yii\db\Schema;
use yii\db\Migration;

class m150222_190121_task_problem_file extends Migration
{
    public function up()
    {
        $this->addColumn('tasks', 'problem_file', Schema::TYPE_STRING .'(255)');
    }

    public function down()
    {
        $this->dropColumn('tasks', 'problem_file');
    }
}
