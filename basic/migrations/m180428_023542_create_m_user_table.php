<?php

use yii\db\Migration;

/**
 * Handles the creation of table `m_user`.
 */
class m180428_023542_create_m_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('m_user', [
            'id' => $this->primaryKey(),
            'friendly_name'=>$this->string()->notNull(),
            'username'=>$this->string()->notNull(),
            'auth_key'=>$this->string(32)->notNull(),
            'password_hash'=>$this->string()->notNull(),
            'password_reset_token'=>$this->string(),
            'email'=>$this->string()->notNull(),
            'role'=>$this->smallInteger()->notNull()->defaultValue(10),
            'status'=>$this->smallInteger()->notNull()->defaultValue(10),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('m_user');
    }
}
