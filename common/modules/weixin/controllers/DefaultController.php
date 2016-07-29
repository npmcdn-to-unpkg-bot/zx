<?php

namespace common\modules\weixin\controllers;

use common\weixin\SendHelper;
use yii\web\Controller;
use yii\helpers\WeixinHelper;

/**
 * Default controller for the `weixin` module
 */
class DefaultController extends BaseController
{

    public $enableCsrfValidation = false;

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


        $postData = file_get_contents('php://input');

        \Yii::info($postData,'wxlog');

        if(!empty($postData)){

            $wid= $request->get('wid');

            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            /*消息发送者的openid*/
            $WXOpenid = $postObj->FromUserName;
            /*公众号*/
            $WXgongzhong = $postObj->ToUserName;
            /*消息类型*/
            $MsgType = strtolower($postObj->MsgType);

            \Yii::info($WXOpenid.'--'.$WXgongzhong,'wxlog');


            \common\weixin\ResponseHelper::text($WXgongzhong,$WXOpenid,'hahhaha');exit;

            switch($MsgType){
                /*
                 * 发送文本消息
                 * */
                case 'text':


                    \common\weixin\SendHelper::text($FromOpenid,'测试一下行不行',$wid);

                    break;
                /*
                 * 发送地理位置
                 * */
                case 'location':

                    break;
                /*
                 * 发送链接
                 * */
                case 'link':

                    break;
                /*
                 * 发送图片
                 * */
                case 'image':

                    break;
                /*
                 * 发送语音
                 * */
                case 'voice':

                    break;
                /*
                 * 发送视频
                 * */
                case 'video':

                    break;
                /*
                 * 发送小视频
                 * */
                case 'shortvideo':
                    break;


            }
        }



    }

}
