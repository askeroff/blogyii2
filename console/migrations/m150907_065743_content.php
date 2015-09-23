<?php

use yii\db\Schema;
use yii\db\Migration;

class m150907_065743_content extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%content}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string(),
            'text_short' => $this->text(),
            'text_bb' => $this->text(),
            'add_time' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'category_id' => $this->string(),
            'status' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%content}}');
    }




}
