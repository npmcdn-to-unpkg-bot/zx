<?php

namespace app\modules\user;
use common\helper\UHelper;

/**
 * user module definition class
 */
class UserModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\user\controllers';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'except' => ['access/login', 'access/register','access/active','access/username','manage/reset'],
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
        ];
    }


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
