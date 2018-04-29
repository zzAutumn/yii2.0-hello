<?php

use yii\db\Migration;

/**
 * Handles the creation of table `m_friend`.
 */
class m180429_032228_create_m_friend_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('m_friend', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'friend_id' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'number_meetings' => $this->integer()->notNull()->defaultValue(0),
            'is_favorite' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_friend_user_id', '{{%m_friend}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_friend_friend_id', '{{%m_friend}}', 'friend_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('m_friend');
    }
}
