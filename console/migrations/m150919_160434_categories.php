<?php

use yii\db\Schema;
use yii\db\Migration;

class m150919_160434_categories extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%categories}}', [
            'id'    => Schema::TYPE_PK,
            'lft'   => Schema::TYPE_INTEGER . ' NOT NULL',
            'rgt'   => Schema::TYPE_INTEGER . ' NOT NULL',
            'depth' => Schema::TYPE_INTEGER . ' NOT NULL',
            'slug' => $this->string(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);
        $this->createIndex('lft', '{{%categories}}', ['lft', 'rgt']);
        $this->createIndex('rgt', '{{%categories}}', ['rgt']);

    }

    public function down()
    {
        echo "m150919_160434_categories cannot be reverted.\n";

        return false;
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
