<?php

use yii\db\Schema;
use yii\db\Migration;

class m150119_172014_checkertests extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->addColumn('contests', 'status', Schema::TYPE_INTEGER .'(1)');

        $this->addColumn('langs', 'identifier', Schema::TYPE_STRING);

        $this->addColumn('tasks', 'input', Schema::TYPE_STRING);
        $this->addColumn('tasks', 'output', Schema::TYPE_STRING);
        $this->addColumn('tasks', 'checker', Schema::TYPE_STRING);
        $this->addColumn('tasks', 'time_limit', Schema::TYPE_STRING);
        $this->addColumn('tasks', 'memory_limit', Schema::TYPE_STRING);

        $this->dropColumn('tasks', 'created_at');
        $this->dropColumn('tasks', 'status');

        $this->dropColumn('users', 'created_at');
        $this->dropColumn('users', 'updated_at');


        $this->createTable('checkergroups', [
            'id' => Schema::TYPE_INTEGER . ' AUTO_INCREMENT',
            'tid' => Schema::TYPE_INTEGER,
            'method' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING,
            'PRIMARY KEY (id)',
            'FOREIGN KEY (tid) REFERENCES tasks(id) ON DELETE CASCADE ON UPDATE CASCADE'
        ], $tableOptions);

        $this->createTable('checkertests', [
            'id' => Schema::TYPE_INTEGER . ' AUTO_INCREMENT',
            'gid' => Schema::TYPE_INTEGER,
            'scores' => Schema::TYPE_INTEGER,
            'input' => Schema::TYPE_STRING,
            'output' => Schema::TYPE_STRING,
            'PRIMARY KEY (id)',
            'FOREIGN KEY (gid) REFERENCES checkergroups(id) ON DELETE CASCADE ON UPDATE CASCADE'
        ], $tableOptions);

        $this->addForeignKey('lid', 'solutions', 'lid', 'langs', 'id');
    }

    public function down()
    {
        $this->addColumn('users', 'created_at', Schema::TYPE_INTEGER);
        $this->addColumn('users', 'updated_at', Schema::TYPE_INTEGER);

        $this->addColumn('tasks', 'status', Schema::TYPE_INTEGER .'(1)');
        $this->addColumn('tasks', 'created_at', Schema::TYPE_INTEGER);

        $this->dropColumn('langs', 'identifier');

        $this->dropColumn('contests', 'status');

        $this->dropColumn('tasks', 'input');
        $this->dropColumn('tasks', 'output');
        $this->dropColumn('tasks', 'checker');
        $this->dropColumn('tasks', 'time_limit');
        $this->dropColumn('tasks', 'memory_limit');

        $this->dropTable('checkertests');
        $this->dropTable('checkergroups');
        $this->dropForeignKey('lid', 'solutions');
    }
}
