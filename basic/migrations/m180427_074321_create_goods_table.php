<?php

use yii\db\Migration;

/**
 * Handles the creation of table `goods`.
 */
class m180427_074321_create_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('goods', [
            'item_name' => $this->char(255)->notNull(),
            'item_id' => $this->integer(),
            'vendor' => $this->char(255),
            'catolog' => $this->char(255),
            'type' => $this->char(255),
            'url' => $this->char(255),
            'PRIMARY KEY(item_name)',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('goods');
    }
}
