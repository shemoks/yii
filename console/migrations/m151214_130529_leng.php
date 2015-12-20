<?php

use yii\db\Schema;
use yii\db\Migration;

class m151214_130529_leng extends Migration
{
    public function up()
    {
        $this->createTable('languages', [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING. ' NOT NULL',
            'local' => Schema::TYPE_STRING. ' NOT NULL',
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'default' => Schema::TYPE_SMALLINT. '  NOT NULL DEFAULT 0',
            'date_update' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date_create' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('languages');

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
