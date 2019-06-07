<?php


namespace app\controllers;


use app\models\filters\TasksFilter;
use app\models\tables\Tasks;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use app\models\Task;
use Yii;
use yii\filters\PageCache;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class TaskController extends Controller
{

    public function actionIndex()
    {

        $month = Yii::$app->request->post('TasksFilter')['deadline'];
        $searchModel = new TasksFilter();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $month);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'month' => $month,
        ]);
    }


    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCard($id)
    {
        $model = $this->findModel($id);
        $status = TaskStatuses::getStatusesList();
        $responsible = Users::getUsersList();

        return $this->render('card', [
            'model' => $model,
            'status'=>$status,
            'responsible'=>$responsible,
        ]);
    }

    public function actionSave($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('card', [
            'model' => $model,
        ]);
    }



    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}