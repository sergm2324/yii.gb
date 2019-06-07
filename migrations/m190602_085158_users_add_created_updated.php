<?php

use yii\db\Migration;

/**
 * Class m190602_085158_users_add_created_updated
 */
class m190602_085158_users_add_created_updated extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'created_at', 'DATETIME AFTER email');
        $this->addColumn('users', 'updated_at', 'DATETIME AFTER created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users','created_at');
        $this->dropColumn('users','updated_at');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190602_085158_users_add_created_updated cannot be reverted.\n";

        return false;
    }
    */
}
