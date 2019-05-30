<?php


namespace app\controllers;


use app\models\User;
use yii\web\Controller;

class UsersController extends Controller
{
    public function actionIndex()
    {

        $users = new User();
        $result = $users->myGetUsers();

//        $user = $users->findByUsername('admin');
//        var_dump($user);
//        exit;

        return $this->render('index', [
            'result' => $result
        ]);

    }
}