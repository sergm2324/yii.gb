<?php

use yii\db\Migration;

/**
 * Class m190602_084511_users_add_created_updated
 */
class m190602_084511_users_add_created_updated extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190602_084511_users_add_created_updated cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190602_084511_users_add_created_updated cannot be reverted.\n";

        return false;
    }
    */
}
