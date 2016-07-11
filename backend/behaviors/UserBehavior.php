<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2016/5/12
 * Time: 21:02
 */

namespace backend\behaviors;

use yii\helpers\UHelper;
use yii\base\Behavior;
use yii\helpers\Url;
use yii\base\ActionEvent;
use yii\web\Controller;

class UserBehavior extends Behavior
{
    public $actions = [];


    /**
     * Declares event handlers for the [[owner]]'s events.
     * @return array events (array keys) and the corresponding event handler methods (array values).
     */
    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    /**
     * @param ActionEvent $event
     * @return boolean
     * @throws MethodNotAllowedHttpException when the request method is not allowed.
     */
    public function beforeAction($event)
    {
        $action = $event->action->id;
        if(\Yii::$app->user->identity->pid>0 && !in_array($action,$this->actions)){//子帐号才进行判断
            UHelper::alert('抱歉，你没有权限查看这个页面','error');
            return \Yii::$app->response->redirect(Url::toRoute(['/index/index']));
        }

    }
}