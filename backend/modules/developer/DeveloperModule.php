<?php

namespace app\modules\developer;

/**
 * developer module definition class
 */
class DeveloperModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\developer\controllers';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'except' => ['access/login', 'access/register','access/active'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],//@表示认证用户
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return \Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['/user/access/login']));
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }






    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        if(\Yii::$app->user->identity->role!='DEVELOPER'){
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');die;
        }
    }
}
