<?php
/**
 * Date: 2016/7/26
 * Time: 16:33
 * 微信公共类
 */
namespace common\modules\weixin\controllers;

use yii\web\Controller;

class BaseController extends Controller
{


    protected function checkSignature($wid)
    {

        $model=\common\models\table\Web::findOne($wid);

        $request=\Yii::$app->request;

        $signature = $request->get('signature');

        $timestamp = $request->get('timestamp');

        $nonce = $request->get('nonce');

        $token = $model->wx_token;

        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }


}