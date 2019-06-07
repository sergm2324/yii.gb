<?php

use app\models\filters\TasksFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TasksFilter */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список задач';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo \yii\widgets\ListView::widget([
        'itemView'=>'myview',
        'dataProvider'=>$dataProvider,
        'viewParams'=>[
            'hide'=>'true'
        ]
    ])?>


</div>
