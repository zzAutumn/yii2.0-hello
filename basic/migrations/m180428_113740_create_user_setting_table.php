<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_setting`.
 */
class m180428_113740_create_user_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_setting', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'filename' => $this->string()->notNull(),
            'avatar' => $this->string()->notNull(),
            'reminder_eve' => $this->integer()->notNull(),
            'reminder_hours' => $this->integer()->notNull(),
            'contact_share' => $this->integer()->notNull(),
            'no_email' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_user_setting_user_id', '{{%user_setting}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_setting');
    }
}
