<?php

use yii\db\Migration;

/**
 * Handles the creation of table `m_meeting_time`.
 */
class m180428_060918_create_m_meeting_time_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('m_meeting_time', [
            'id' => $this->primaryKey(),
            'meeting_id' => $this->integer()->notNull(),
            'start' => $this->integer()->notNull(),
            'suggested_by' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_meeting_time_meeting', '{{%m_meeting_time}}', 'meeting_id', '{{%m_meeting}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_participant_suggested_by', '{{%m_meeting_time}}', 'suggested_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('m_meeting_time');
    }
}
