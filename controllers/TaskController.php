<?php


namespace app\controllers;


use app\models\filters\CommentsFilter;
use app\models\filters\FilesFilter;
use app\models\filters\TasksFilter;
use app\models\tables\Comments;
use app\models\tables\Files;
use app\models\tables\Tasks;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use app\models\Task;
use Yii;
use yii\filters\PageCache;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class TaskController extends Controller
{

    public function actionIndex()
    {

        $month = Yii::$app->request->post('TasksFilter')['deadline'];
        $searchModel = new TasksFilter();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->cache->flush();
            return $this->redirect(['index']);
        }

        $status = TaskStatuses::getStatusesList();
        $responsible = Users::getUsersList();


        $searchModelComments = new CommentsFilter();
        $dataProviderComments = $searchModelComments->search(Yii::$app->request->queryParams);

        $searchModelFiles = new FilesFilter();
        $dataProviderFiles = $searchModelFiles->search(Yii::$app->request->queryParams);

        return $this->render('card', [
            'model' => $model,
            'status'=>$status,
            'responsible'=>$responsible,
            'searchModelComments' => $searchModelComments,
            'dataProviderComments' => $dataProviderComments,
            'searchModelFiles' => $searchModelFiles,
            'dataProviderFiles' => $dataProviderFiles,
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

    /**
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatec()
    {
        $model = new Comments();
        $model->task_id=Yii::$app->request->get('id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/task/card', 'id' => $model->task_id]);
        }

        return $this->render('createcomment', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Files model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatef()
    {
        $model = new Files();
        $model->task_id=Yii::$app->request->get('id');

        if ($model->load(Yii::$app->request->post())) {
            $model->task_id=Yii::$app->request->get('id');
            $model->upload = UploadedFile::getInstance($model, 'name');
            $model->name=$model->upload->name;
            $model->save();
            $model->saveFile();
            return $this->redirect(['/task/card', 'id' => $model->task_id]);
        }

        return $this->render('createfile', [
            'model' => $model,
        ]);
    }

}