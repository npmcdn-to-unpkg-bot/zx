<?php

namespace common\modules\weixin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `weixin` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $request=\Yii::$app->request;
        /*
         * 微信接入
         * */
        if($request->get('signature') && $request->get('timestamp') && $request->get('nonce') && $request->get('echostr')){
            if(self::checkSignature($request->get('wid'))){
                die($request->get('echostr'));
            }else{
                die(false);
            }
        }





    }
}
