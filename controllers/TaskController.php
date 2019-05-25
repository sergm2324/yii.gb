<?php


namespace app\controllers;


use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{

    public function actionIndex()
    {

        return $this->render('index');

    }


    public function actionCard()
    {
        $model = new Task();

        $model->load([
            'name'=> 'Написать программу',
             'discribe'=>'Таск-менеджер',
             'autor'=>'Пушкин А.С.',
             'responsible'=>'Пушкин А.С.',
             'datedo'=>'2019-01-01'
        ],'');

        $model->validate();

        return $this->render('card', [
            'model' => $model, 'myerrors'=>$model->getErrors()
        ]);

    }


}