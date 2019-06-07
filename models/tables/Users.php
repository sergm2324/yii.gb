<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username Имя пользователя
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Tasks[] $tasks
 * @property Tasks[] $tasks0
 */
class Users extends \yii\db\ActiveRecord
{
//    const SCENARIO_AUTH = 'auth';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'string', 'max' => 50],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['creator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Tasks::className(), ['responsible_id' => 'id']);
    }

//    public function fields()
//    {
//            return [
//                'username'=>'login',
//                'id',
//                'password'
//            ];
//
//
////        return parent::fields();
//    }

}
