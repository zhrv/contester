<?php

use yii\db\Schema;
use yii\db\Migration;

class m141213_185845_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('users', [
            'id' => Schema::TYPE_INTEGER . ' AUTO_INCREMENT',
            'login' => Schema::TYPE_STRING . '(255) NOT NULL',
            'pass' => Schema::TYPE_STRING . '(255)',
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(255) NOT NULL',
            'access_token' => Schema::TYPE_STRING . '(255) NOT NULL',
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
            'PRIMARY KEY (id)',
        ], $tableOptions);

        $this->createTable('contests', [
            'id' => Schema::TYPE_INTEGER . ' AUTO_INCREMENT',
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'start_at' => Schema::TYPE_INTEGER,
            'finish_at' => Schema::TYPE_INTEGER,
            'PRIMARY KEY (id)',
        ], $tableOptions);

        $this->createTable('tasks', [
            'id' => Schema::TYPE_INTEGER . ' AUTO_INCREMENT',
            'cid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . '(255)',
            'content' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_INTEGER,
            'status' => Schema::TYPE_INTEGER .'(1)',
            'PRIMARY KEY (id)',
            'FOREIGN KEY (cid) REFERENCES contests(id) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);

        $this->createTable('langs', [
            'id' => Schema::TYPE_INTEGER . ' AUTO_INCREMENT',
            'name' => Schema::TYPE_STRING . '(255)',
            'compiler' => Schema::TYPE_STRING . '(255)',
            'extension' => Schema::TYPE_STRING . '(16)',
            'PRIMARY KEY (id)',
        ], $tableOptions);

        $this->createTable('solutions', [
            'id' => Schema::TYPE_INTEGER . ' AUTO_INCREMENT',
            'uid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'tid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'lid' => Schema::TYPE_INTEGER . ' NOT NULL',
            'code' => Schema::TYPE_TEXT,
            'file' => Schema::TYPE_STRING . '(255)',
            'created_at' => Schema::TYPE_INTEGER,
            'hash' => Schema::TYPE_STRING,
            'PRIMARY KEY (id)',
            'FOREIGN KEY (uid) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY (tid) REFERENCES tasks(id) ON DELETE CASCADE ON UPDATE CASCADE'
        ], $tableOptions);

        $this->createTable('tests', [
            'id' => Schema::TYPE_INTEGER . ' AUTO_INCREMENT',
            'sid' => Schema::TYPE_INTEGER,
            'num' => Schema::TYPE_INTEGER,
            'res' => Schema::TYPE_INTEGER . '(1)',
            'PRIMARY KEY (id)',
            'FOREIGN KEY (sid) REFERENCES solutions(id) ON DELETE CASCADE ON UPDATE CASCADE'
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('tests');
        $this->dropTable('solutions');
        $this->dropTable('tasks');
        $this->dropTable('contests');
        $this->dropTable('users');
        $this->dropTable('langs');

        return true;
    }
}
