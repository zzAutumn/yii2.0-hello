<?php

use yii\db\Migration;

/**
 * Handles the creation of table `m_participant`.
 */
class m180428_060103_create_m_participant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /*$this->createTable('m_participant', [
            'id' => $this->primaryKey(),
            'meeting_id' => $this->integer()->notNull(),
            'participant_id' => $this->integer()->notNull(),
            'invited_by' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);*/
        $this->addForeignKey('fk_participant_m_meeting', '{{%m_participant}}', 'meeting_id', '{{%m_meeting}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_participant_m_participant', '{{%m_participant}}', 'participant_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_participant_invited_by', '{{%m_participant}}', 'invited_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('m_participant');
    }
}
