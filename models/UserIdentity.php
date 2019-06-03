<?php

namespace app\models;

use app\models\tables\Tasks;
use app\models\tables\Users;

class UserIdentity extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $created_at;
    public $updated_at;
    public $authKey;
    public $accessToken;

    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        if($user = Users::findOne($id))
        {
//            $user->setScenario(Users::SCENARIO_AUTH);
            return new static($user->toArray());
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        if($user = Users::findOne(['username'=>$username]))
        {

//            $user->setScenario(Users::SCENARIO_AUTH);
            return new static($user->toArray());
        }

        //return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

//    public function myGetUsers(){
//        $db = \Yii::$app->db;
//        $users = $db->createCommand("SELECT * FROM users")
//            ->queryAll();
//        return $users;
//    }


}
