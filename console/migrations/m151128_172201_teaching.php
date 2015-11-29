<?php

use yii\db\Schema;
use yii\db\Migration;

class m151128_172201_teaching extends Migration
{
    public function up()
    {
        $this->createTable('teaching', [
            'id_subject' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_teacher' => Schema::TYPE_INTEGER . ' NOT NULL',
            'year'       => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addForeignKey('teaching_teacher', 'teaching', 'id_teacher', 'teachers', 'id');
        $this->addForeignKey('teaching_subject', 'teaching', 'id_subject', 'subjects', 'id');
        $this->addPrimaryKey('teaching_year', 'teaching', ['id_subject', 'id_teacher', 'year']);

    }

    public function down()
    {
        $this->dropTable('teaching');
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
