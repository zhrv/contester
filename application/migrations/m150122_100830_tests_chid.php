<?php

use yii\db\Schema;
use yii\db\Migration;

class m150122_100830_tests_chid extends Migration
{
    public function up()
    {
        $this->addColumn('tests', 'cid', Schema::TYPE_INTEGER);
        $this->addForeignKey('cid', 'tests', 'cid', 'checkertests', 'id', 'CASCADE', 'CASCADE');

        $this->addColumn('solutions', 'score', Schema::TYPE_INTEGER);
        $this->addColumn('solutions', 'status', Schema::TYPE_INTEGER);
        $this->addColumn('solutions', 'result', Schema::TYPE_TEXT);

    }

    public function down()
    {
        $this->dropForeignKey('cid', 'tests');
        $this->dropColumn('tests', 'cid');

        $this->dropColumn('solutions', 'score');
        $this->dropColumn('solutions', 'status');
        $this->dropColumn('solutions', 'result');
    }
}
