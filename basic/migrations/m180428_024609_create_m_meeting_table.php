<?php

use yii\db\Migration;

/**
 * Handles the creation of table `m_meeting`.
 */
class m180428_024609_create_m_meeting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('m_meeting', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'meeting_type'=>$this->smallInteger()->notNull()->defaultValue(0),
            'message'=>$this->text()->notNull()->defaultValue(""),
            'status'=>$this->smallInteger()->notNull()->defaultValue(0),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_meeting_owner','{{%m_meeting}}','owner_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_meeting_owner', '{{%meeting}}');
        $this->dropTable('m_meeting');
    }
}
