<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m180426_052755_extend_status_table_for_created_by
 */
class m180426_052755_extend_status_table_for_created_by extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        //$this->addColumn('{{%status}}','created_by',Schema::TYPE_INTEGER.' NOT NULL');
        $this->addForeignKey('fk_status_created_by', '{{%status}}', 'created_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m180426_052755_extend_status_table_for_created_by cannot be reverted.\n";
        $this->dropForeignKey('fk_status_created_by','{{%status}}');
        $this->dropColumn('{{%status}}','created_by');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180426_052755_extend_status_table_for_created_by cannot be reverted.\n";

        return false;
    }
    */
}
