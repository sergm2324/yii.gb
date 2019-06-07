<?php


namespace app\components;

use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;
use Yii;
use yii\helpers\Url;

class Bootstrap extends Component implements BootstrapInterface
{

        public function bootstrap($app)
        {

            Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT,
                function ($event) {
                $user = Users::findOne([
                   'id'=>$event->sender['responsible_id']
                ]);
                    Yii::$app->mailer->compose()
                        ->setTo($user->email)
                        ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                        ->setReplyTo(['adminka@mail.ru'])
                        ->setSubject('New task')
                        ->setTextBody('You have the new task!')
                        ->send();
                });
        }

}