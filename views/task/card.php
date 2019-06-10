<?php

use app\models\tables\Tasks;
use \yii\widgets\ActiveForm;
use yii\helpers\Html;
use \yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = 'Редактирование задачи: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список задач', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
$this->params['breadcrumbs'][] = 'Карточка задачи';
?>
<div class="tasks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'status'=>$status,
        'responsible'=>$responsible,
        'dataProviderComments'=>$dataProviderComments,
        'searchModelComments'=>$searchModelComments,
        'dataProviderFiles'=>$dataProviderFiles,
        'searchModelFiles'=>$searchModelFiles,
    ]) ?>

</div>
