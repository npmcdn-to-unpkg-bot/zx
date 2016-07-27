<?php

namespace common\modules\weixin\controllers;

use yii\web\Controller;
use yii\helpers\WeixinHelper;

/**
 * Default controller for the `weixin` module
 */
class DefaultController extends BaseController
{
    /**
     *微信接收信息入口
     */
    public function actionIndex()
    {
        $request=\Yii::$app->request;
        /*
         * 微信接入
         * */
        if($request->get('signature') && $request->get('timestamp') && $request->get('nonce') && $request->get('echostr')){
            if(WeixinHelper::checkSignature($request->get('wid'))){
                die($request->get('echostr'));
            }else{
                die(false);
            }
        }
    }

}
