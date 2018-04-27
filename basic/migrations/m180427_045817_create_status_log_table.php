<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status_log`.
 */
class m180427_045817_create_status_log_table extends Migration
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
        $this->createTable('status_log', [
            'id' => $this->primaryKey(),
            'status_id' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
        ],$tableOptions);
        $this->addForeignKey('fk_status_log_id', '{{%status_log}}', 'status_id', '{{%status}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_status_log_updated_by', '{{%status_log}}', 'updated_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('status_log');
    }
}
