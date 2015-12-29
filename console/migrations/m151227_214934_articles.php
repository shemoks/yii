<?php

use yii\db\Schema;
use yii\db\Migration;

class m151227_214934_articles extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'topic' => $this->string()
            ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('articles');
    }

  }
