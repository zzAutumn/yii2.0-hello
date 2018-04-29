<?php

use yii\db\Migration;

/**
 * Handles the creation of table `m_meeting_note`.
 */
class m180429_014226_create_m_meeting_note_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('m_meeting_note', [
            'id' => $this->primaryKey(),
            'meeting_id' => $this->integer()->notNull(),
            'posted_by' => $this->integer()->notNull()->defaultValue(0),
            'note' => $this->text()->notNull()->defaultValue(""),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_meeting_note_meeting', '{{%m_meeting_note}}', 'meeting_id', '{{%m_meeting}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_meeting_note_posted_by', '{{%m_meeting_note}}', 'posted_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('m_meeting_note');
    }
}
