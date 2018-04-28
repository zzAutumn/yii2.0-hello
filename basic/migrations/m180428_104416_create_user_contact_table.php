<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_contact`.
 */
class m180428_104416_create_user_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_contact', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'contact_type' => $this->integer()->notNull()->defaultValue(0),
            'info' => $this->string()->notNull(),
            'details' => $this->text()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' =>$this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_user_contact_user', '{{%user_contact}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_contact');
    }
}
