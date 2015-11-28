<?php

use yii\db\Schema;
use yii\db\Migration;

class m151128_153407_departments extends Migration
{
    public function up()
    {
        $this->createTable('departments', [
        'id'=>Schema::TYPE_PK,
        'title'=>Schema::TYPE_STRING . ' NOT NULL',
    ]);
    }

    public function down()
    {
        $this->dropTable('departments');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
