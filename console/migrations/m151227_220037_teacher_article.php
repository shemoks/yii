<?php

use yii\db\Schema;
use yii\db\Migration;

class m151227_220037_teacher_article extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('article_teacher', [
            'id_teacher' => $this->integer(),
            'id_article' => $this->integer(),
        ], $tableOptions);
        $this->addForeignKey('FK_teacher_article', 'article_teacher', 'id_teacher', 'teachers', 'id');
        $this->addForeignKey('FK_article_teacher', 'article_teacher', 'id_article', 'articles', 'id');
    }

    public function down()
    {
        $this->dropTable('article_teacher');
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
