<?php

use app\models\filters\CommentsFilter;
use app\models\filters\FilesFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */

/* @var $searchModelComments app\models\filters\CommentsFilter */
/* @var $dataProviderComments yii\data\ActiveDataProvider */
/* @var $searchModelFiles app\models\filters\FilesFilter */
/* @var $dataProviderFiles yii\data\ActiveDataProvider */


\Yii::$app->language =$_SESSION['language'];
$this->title = Yii::t('app', 'Comments');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="task-edit">
    <div class="task-main">
        <?php $form = ActiveForm::begin(['action' => Url::to(['task/card', 'id' => $model->id])]);?>
        <?=$form->field($model, 'name')->textInput();?>
        <div class="row">
            <div class="col-lg-4">
                <?=$form->field($model, 'status_id')->dropDownList($status)?>
            </div>
            <div class="col-lg-4">
                <?=$form->field($model, 'responsible_id')->dropDownList($responsible)?>
            </div>
            <div class="col-lg-4">
                <?=$form->field($model, 'deadline')
                    ->textInput(['type' => 'date'])
                ?>
            </div>
        </div>

        <div>
            <?=$form->field($model, 'description')
                ->textarea()?>
        </div>

        <p>
            <?= Html::a(Yii::t('app', 'Create Files'), ['createf','id' => $model->id], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProviderFiles,
            'filterModel' => $searchModelFiles,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>



        <p>
            <?= Html::a(Yii::t('app', 'Create Comments'), ['createc','id' => $model->id], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProviderComments,
            'filterModel' => $searchModelComments,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


        <?=Html::submitButton(\Yii::t("app",'Save'),['class' => 'btn btn-success']);?>
        <?ActiveForm::end()?>
    </div>
</div>
