<?php


namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{

    public function actionIndex()
    {
        $am = \Yii::$app->authManager;

        $admin = $am->createRole("admin");
        $moder = $am->createRole("moder");

        $am->add($admin);
        $am->add($moder);

        $permisionTaskCreate = $am->createPermission("TaskCreate");
        $permisionTaskUpdate = $am->createPermission("TaskUpdate");
        $permisionTaskDelete = $am->createPermission("TaskDelete");
        $permisionTaskView = $am->createPermission("TaskView");

        $am->add($permisionTaskCreate);
        $am->add($permisionTaskUpdate);
        $am->add($permisionTaskDelete);
        $am->add($permisionTaskView);

        $am->addChild($admin,$permisionTaskCreate);
        $am->addChild($admin,$permisionTaskUpdate);
        $am->addChild($admin,$permisionTaskDelete);
        $am->addChild($admin,$permisionTaskView);

        $am->addChild($moder,$permisionTaskCreate);
        $am->addChild($moder,$permisionTaskUpdate);
        $am->addChild($moder,$permisionTaskView);

        $am->assign($admin,1);
        $am->assign($moder,2);

    }

}