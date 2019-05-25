<?php


namespace app\models;


use yii\base\Model;

class Task extends Model
{

    public $name; //название задачи
    public $discribe; //описание
    public $autor; //автор
    public $responsible; //ответственный
    public $datedo; //дата дедлайна


    public function rules()
    {
        return [
            [['name', 'discribe', 'autor', 'responsible', 'datedo'], 'required'],
            ['name', 'string', 'length' => [10, 24]],
            ['datedo', 'date'],
            ['responsible', 'myValidate'],
        ];
    }

    public function myValidate($attr, $param)
    {
        if ($this->$attr === $this->autor) {
            $this->addError($attr, 'Ответственный равен автору');
        }
    }


}