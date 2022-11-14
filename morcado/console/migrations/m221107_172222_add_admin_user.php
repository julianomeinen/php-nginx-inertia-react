<?php

use yii\db\Migration;

/**
 * Class m221107_172222_add_admin_user
 */
class m221107_172222_add_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('admin_user', [
            'uuid' => $this->primaryKey(),
            'firstname' => $this->string()->notNull(),
            'lastname' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'title' => $this->string(),
            'oauth_id' => $this->string(255),
            'timezone' => $this->string(50),
            'status' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('admin_user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221107_172222_add_admin_user cannot be reverted.\n";

        return false;
    }
    */
}
