<?php


namespace app\commands;


use app\models\tables\Tasks;
use app\models\tables\Users;
use Yii;
use yii\console\Controller;
use yii\db\Expression;
use yii\helpers\Console;

class TaskController extends Controller
{
    public $message = 'hello';
    public function actionTest($id)
    {
        if($user = Users::findOne($id)){
            $this->stdout("{$this->message},{$user->username}", Console::BG_BLUE);
            return 0;
        }
        return 1;

    }

    public function actionDeadline()
    {
        $today = date('d');
        $model = Tasks::find()->where("(DAY(deadline)-'$today')<2 AND (DAY(deadline)-'$today')>0")->all();
        foreach ($model as $value) {
            $user = $value->userres;
            Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo(['adminka@mail.ru'])
                ->setSubject('Attention!')
                ->setTextBody('You have only 1 day for your task!')
                ->send();
        };
    }


    public function actionHandler()
    {
        $count = 30;
        Console::startProgress(1, $count);
        for ($i = 1; $i<$count; $i++){
            sleep(1);
            Console::updateProgress($i, $count);
        }
        Console::endProgress();
    }

    public function options($actionID)
    {
        return ['message'];
    }

    public function optionAliases()
    {
        return ['m'=>'message'];
    }


}