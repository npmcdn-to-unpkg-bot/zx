<?php
/**
 * Date: 2016/8/22
 * Time: 17:35
 */
namespace frontend\controllers;

use yii\helpers\UHelper;
use yii\web\Controller;
use yii\helpers\Url;

class BaseController extends Controller
{
    public function init()
    {
        parent::init();

        \Yii::$app->params['WEBID']=UHelper::getWebId();

        \Yii::$app->security->generateRandomString();
    }

    /*
     * 生成二维码
     * */
    public function actionGenerateverifycode()
    {
        $headers = \Yii::$app->response->headers;

        // 增加一个 Pragma 头，已存在的Pragma 头不会被覆盖。
        $headers->set('Content-Type', 'image/png');

        \Yii::$app->response->send();

        $v=new \yii\helpers\VerifyHelper();

        return $v->entry();

    }



}