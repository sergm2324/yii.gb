<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190526_123251_create_users_table extends Migration
{

    protected $tableName = 'users';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull()->comment("Имя пользователя"),
            'password' => $this->string(),
            'authKey' => $this->string(),
            'accessToken' => $this->string(),
        ]);
        $this->createIndex("users_username_idx", 'users', ['username']);

        $taskTable = \app\models\tables\Tasks::tableName();

        $this->addForeignKey('fk_creator_id_user_id',$taskTable, 'creator_id', $this->tableName, 'id');

        $this->addForeignKey('fk_responsible_id_user_id',$taskTable, 'responsible_id', $this->tableName, 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
