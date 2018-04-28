<?php

use yii\db\Migration;

/**
 * Handles the creation of table `m_place`.
 */
class m180428_055010_create_m_place_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('m_place', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'place_type'=>$this->smallInteger()->notNull()->defaultValue(0),
            'status'=>$this->smallInteger()->notNull()->defaultValue(0),
            'google_place_id'=>$this->string()->notNull(),
            'created_by'=>$this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_place_created_by','{{%m_place}}','created_by','{{%user}}','id','CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('m_place');
    }
}
