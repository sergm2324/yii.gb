<?php


namespace app\widgets;


use yii\base\Widget;

class MyWidget extends Widget
{

    public $label = "Нажми нежно";

    public function run()
    {
        return $this->render('my', ['label' => $this->label]);
    }

}