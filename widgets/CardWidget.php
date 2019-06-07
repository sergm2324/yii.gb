<?php


namespace app\widgets;


use yii\base\Widget;

class CardWidget extends Widget
{

    public $model;


    public function run()
    {
        return $this->render('card', ['model' => $this->model]);
    }

}