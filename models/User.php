<?php

namespace app\models;

use app\models\tables\Tasks;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    public static function tableName()
    {
        return 'users';
    }


//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }

        $db = \Yii::$app->db;
        $user = $db->createCommand("SELECT * FROM users WHERE accessToken=:token LIMIT 1")
            ->bindValue(':token', $token)->queryOne();

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

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
//        foreach (self::$users as $user) {
//            if (strcasecmp($user['username'], $username) === 0) {
//                return new static($user);
//            }
//        }
//
//        return null;

        $db = \Yii::$app->db;
        $user = $db->createCommand("SELECT * FROM users WHERE username=:username LIMIT 1")
            ->bindValue(':username', $username)->queryOne();

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

    public function myGetUsers(){
        $db = \Yii::$app->db;
        $users = $db->createCommand("SELECT * FROM users")
            ->queryAll();
        return $users;
    }


}
