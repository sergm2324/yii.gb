<?php


namespace app\controllers;


use yii\web\Controller;

class LangController extends Controller
{

    public function actionRu()
    {
        $_SESSION['language'] = 'ru';
        \Yii::$app->language =$_SESSION['language'];
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionEn()
    {
        $_SESSION['language'] = 'en';
        \Yii::$app->language =$_SESSION['language'];
        return $this->redirect(\Yii::$app->request->referrer);
    }


}