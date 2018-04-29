<?php

use yii\db\Migration;

/**
 * Handles the creation of table `m_meeting_log`.
 */
class m180429_014208_create_m_meeting_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('m_meeting_log', [
            'id' => $this->primaryKey(),
            'meeting_id' => $this->integer()->notNull(),
            'action' => $this->integer()->notNull(),
            'actor_id' => $this->integer()->notNull(),
            'item_id' => $this->integer()->notNull(),
            'extra_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_meeting_log_meeting', '{{%m_meeting_log}}', 'meeting_id', '{{%m_meeting}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_meeting_log_actor', '{{%m_meeting_log}}', 'actor_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('m_meeting_log');
    }
}
