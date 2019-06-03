<?php

use yii\db\Migration;

/**
 * Class m190602_075410_users_add_email
 */
class m190602_075410_users_add_email extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'email', 'VARCHAR(64) AFTER password');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190602_075410_users_add_email cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190602_075410_users_add_email cannot be reverted.\n";

        return false;
    }
    */
}
