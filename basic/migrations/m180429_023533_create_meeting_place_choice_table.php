<?php

use yii\db\Migration;

/**
 * Handles the creation of table `meeting_place_choice`.
 */
class m180429_023533_create_meeting_place_choice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('meeting_place_choice', [
            'id' => $this->primaryKey(),
            'meeting_place_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_mpc_meeting_place', '{{%meeting_place_choice}}', 'meeting_place_id', '{{%m_meeting_place}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_mpc_user_id', '{{%meeting_place_choice}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('meeting_place_choice');
    }
}
