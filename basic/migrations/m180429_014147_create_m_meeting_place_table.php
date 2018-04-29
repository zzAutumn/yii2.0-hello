<?php

use yii\db\Migration;

/**
 * Handles the creation of table `m_meeting_place`.
 */
class m180429_014147_create_m_meeting_place_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('m_meeting_place', [
            'id' => $this->primaryKey(),
            'meeting_id' => $this->integer()->notNull(),
            'place_id' => $this->integer()->notNull(),
            'suggested_by' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_meeting_place_meeting', '{{%m_meeting_place}}', 'meeting_id', '{{%m_meeting}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_meeting_place_place', '{{%m_meeting_place}}', 'place_id', '{{%m_place}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_meeting_suggested_by', '{{%m_meeting_place}}', 'suggested_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('m_meeting_place');
    }
}
