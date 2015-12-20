<?php

use yii\db\Schema;
use yii\db\Migration;

class m151128_171105_subjects extends Migration
{
    public function up()
    {
        $this->createTable('subjects', [
            'id'           => Schema::TYPE_PK,
            'title'        => Schema::TYPE_STRING . ' NOT NULL',
            'count_hours'  => Schema::TYPE_INTEGER. ' NOT NULL',
            'type_subject' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('subjects');
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
