<?php

use yii\db\Migration;

/**
 * Handles the creation of table `event`.
 */
class m180430_101245_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('event', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'reporter' => $this->string()->notNull(),
            'time' => $this->string(),
            'description' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('event');
    }
}
