<?php

use yii\db\Migration;

/**
 * Handles the creation of table `inventory`.
 */
class m180427_080320_create_inventory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('inventory', [
            'id' => $this->primaryKey(),
            'item_name' => $this->char(255)->notNull(),
            'vendor' => $this->char(255),
            'catolog' => $this->char(255),
            'type' => $this->char(255),
            'url' => $this->char(255),
            'quantity' =>$this->integer(),
            'unit' => $this->char(255),
            'location' => $this->char(255),
            'per_size' => $this->char(255),
            'per_price' => $this->integer(),
            'note' => $this->char(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('inventory');
    }
}
