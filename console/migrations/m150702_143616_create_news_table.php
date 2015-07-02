<?php

use yii\db\Schema;
use yii\db\Migration;

class m150702_143616_create_news_table extends Migration
{
    public function up()
    {
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
		
        $this->createTable('{{%news}}', [
            'id_news' => Schema::TYPE_PK,
            'name_news' => Schema::TYPE_STRING . ' NOT NULL',
            'date_news' => Schema::TYPE_DATE,
            'text_news' => Schema::TYPE_TEXT,
            'theme_news' => Schema::TYPE_TEXT,
        ], $tableOptions);
		
		$this->createTable('{{%theme}}', [
            'id_theme' => Schema::TYPE_PK,
            'text_theme' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%theme}}');
        $this->dropTable('{{%news}}');
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
