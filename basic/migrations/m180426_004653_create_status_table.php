<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m180426_004653_create_status_table extends Migration
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
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'message'=>$this->text()->notNull()->defaultValue(""),
            'permissions'=>$this->smallInteger()->notNull()->defaultValue(0),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('status');
    }
}
