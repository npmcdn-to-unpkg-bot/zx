<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/28
 * Time: 14:46
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\helper\UHelper;
/**
 * Site controller
 */
class BaseController extends Controller
{
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

    public function init()
    {


        parent::init();

        // custom initialization code goes here
    }
}