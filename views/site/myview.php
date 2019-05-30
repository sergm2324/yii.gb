<?php

use app\models\tables\Tasks;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = $model->name;
if(!$hide){
    $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}

\yii\web\YiiAsset::register($this);
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo \app\widgets\CardWidget::widget([
        'model'=> $model
    ]);

//    echo
//     DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'name',
//            'description',
//            'creator_id',
//            'responsible_id',
//            'deadline',
//            'status_id',
//            [
//                'label'=>'status',
//                'value'=>$model->status->name
//            ],
//            [
//                'label'=>'creator',
//                'value'=>$model->usercr->username
//            ],
//            [
//                'label'=>'responsible',
//                'value'=>$model->userres->username
//            ]
//        ],
//    ])

    ?>

</div>

