<?php

use yii\db\Schema;
use yii\db\Migration;

class m150222_113951_user_fields extends Migration
{
    public function up()
    {
        $this->addColumn('users', 'email', Schema::TYPE_STRING .'(255)');
        $this->addColumn('users', 'surname', Schema::TYPE_STRING .'(255)');
        $this->addColumn('users', 'patronymic', Schema::TYPE_STRING .'(255)');
        $this->addColumn('users', 'city', Schema::TYPE_STRING .'(255)');
        $this->addColumn('users', 'neighborhood', Schema::TYPE_STRING .'(255)');
        $this->addColumn('users', 'school', Schema::TYPE_STRING .'(255)');
        $this->addColumn('users', 'class', Schema::TYPE_STRING .'(255)');
        $this->addColumn('users', 'teacher', Schema::TYPE_STRING .'(255)');
    }

    public function down()
    {
        $this->dropColumn('users', 'email');
        $this->dropColumn('users', 'surname');
        $this->dropColumn('users', 'patronymic');
        $this->dropColumn('users', 'city');
        $this->dropColumn('users', 'neighborhood');
        $this->dropColumn('users', 'school');
        $this->dropColumn('users', 'class');
        $this->dropColumn('users', 'teacher');
    }
}
