<?php

namespace app\models\tables;

use app\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username Имя пользователя
 * @property string $password
 * @property string $email
 * @property int $created_at
 * @property int $updated_at
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Tasks[] $tasks
 * @property Tasks[] $tasks0
 */
class Users extends \yii\db\ActiveRecord
{
//    const SCENARIO_AUTH = 'auth';

    public function behaviors(){

        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ]
        ];
    }


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
            [['email'], 'email'],
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
            'email' => 'Email',
            'created_at' => 'Created_at',
            'updated_at' => 'Updated_at',
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

    public static function getUsersList(){
        $users = static::find()
            ->select(['id','username'])
            ->asArray()
            ->all();
        $userAr = ArrayHelper::map($users, 'id','username');
        return $userAr;
    }

    public static function findIdentity($id)
    {
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;

        $db = \Yii::$app->db;
        $user = $db->createCommand("SELECT * FROM users WHERE id=:id LIMIT 1")
            ->bindValue(':id', $id)->queryOne();

        if($user){
            $obj = new User();
            $obj->id=$user['id'];
            $obj->username=$user['username'];
            $obj->password=$user['password'];
            $obj->authKey=$user['authKey'];
            $obj->accessToken=$user['accessToken'];
            return $obj;
        }
        return null;
    }

}
