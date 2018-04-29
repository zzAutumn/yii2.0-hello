<?php

use yii\db\Migration;

/**
 * Handles the creation of table `meeting_time_choice`.
 */
class m180429_023544_create_meeting_time_choice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('meeting_time_choice', [
            'id' => $this->primaryKey(),
            'meeting_time_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_mtc_meeting_time', '{{%meeting_time_choice}}', 'meeting_time_id', '{{%m_meeting_time}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_mtc_user_id', '{{%meeting_time_choice}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('meeting_time_choice');
    }
}
