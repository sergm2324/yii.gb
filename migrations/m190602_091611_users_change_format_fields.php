<?php

use yii\db\Migration;

/**
 * Class m190602_091611_users_change_format_fields
 */
class m190602_091611_users_change_format_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('users','created_at');
        $this->dropColumn('users','updated_at');
        $this->addColumn('users', 'created_at', 'TIMESTAMP AFTER email');
        $this->addColumn('users', 'updated_at', 'TIMESTAMP AFTER created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190602_091611_users_change_format_fields cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190602_091611_users_change_format_fields cannot be reverted.\n";

        return false;
    }
    */
}
