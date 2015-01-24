<?php

use yii\db\Schema;
use yii\db\Migration;

class m150123_172601_dec_score extends Migration
{
    public function up()
    {
        $this->addColumn('checkergroups', 'scores', Schema::TYPE_INTEGER);

    }

    public function down()
    {
        $this->dropColumn('checkergroups', 'scores');
    }
}
