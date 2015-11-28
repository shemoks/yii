<?php

use yii\db\Schema;
use yii\db\Migration;

class m151128_155725_teachers extends Migration
{
    public function up()
    {
        $this->createTable('teachers', [
            'id'=>Schema::TYPE_PK,
            'userSurname'=>Schema::TYPE_STRING . ' NOT NULL',
            'userName'=>Schema::TYPE_STRING . ' NOT NULL',
            'nickName'=>Schema::TYPE_STRING . ' NOT NULL',
            'dateBorn'=>Schema::TYPE_STRING . ' NOT NULL',
            'sex'=>Schema::TYPE_STRING . ' NOT NULL',
            'education'=>Schema::TYPE_STRING . ' NOT NULL',
            'email'=>Schema::TYPE_STRING . ' NOT NULL',
            'phone'=>Schema::TYPE_STRING . ' NOT NULL',
            'imageFile'=>Schema::TYPE_STRING,
            'password'=>Schema::TYPE_STRING . ' NOT NULL',
            'id_department'=>Schema::TYPE_INTEGER
        ]);

        $this->addForeignKey('teacher_department','teachers', 'id_department', 'departments', 'id');

    }

    public function down()
    {
        $this->dropTable('teachers');
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
