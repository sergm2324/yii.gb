<?php

namespace app\models\tables;

use app\models\User;
use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name Название задачи
 * @property string $description
 * @property int $creator_id
 * @property int $responsible_id
 * @property string $deadline
 * @property int $status_id
 *
 * @property $status
 *
 * @property $user
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['creator_id', 'responsible_id', 'status_id'], 'integer'],
            [['deadline'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'creator_id' => 'Creator ID',
            'responsible_id' => 'Responsible ID',
            'deadline' => 'Deadline',
            'status_id' => 'Status ID',
        ];
    }

    public function getStatus()
    {
        return $this->hasOne(TaskStatuses::class, ['id' => 'status_id']);
    }



//    public function getUser()
//    {
//        return $this->hasOne(User::class, ['id' => 'creator_id']);
//    }

//    public function getUserResponsible()
//    {
//        return $this->hasOne(User::class, ['id' => 'responsible_id']);
//    }

    public function getTasksAll(){
        $db = \Yii::$app->db;
        $tasks = $db->createCommand("SELECT * FROM tasks")
            ->queryAll();
        return $tasks;
    }


}
