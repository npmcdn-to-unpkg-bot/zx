<?php

namespace common\modules\weixin\controllers;

use common\weixin\SendHelper;
use yii\web\Controller;
use common\weixin\ResponseHelper;
use common\weixin\WeixinHelper;


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

        /*
         * 获取微信传输过来的信息
         * */
        $postData = file_get_contents('php://input');


        \Yii::info($postData,'wxlog');

        if(!empty($postData)){

            $wid= $request->get('wid');

            $accessToken=WeixinHelper::accessToken($wid);

            $postObj = simplexml_load_string($postData, 'SimpleXMLElement', LIBXML_NOCDATA);
            /*
             * 消息发送者的openid
             * */
            $wp_openid = $postObj->FromUserName;
            /*
             * 公众号
             * */
            $wp_number = $postObj->ToUserName;
            /*
             * 消息类型
             * */
            $MsgType = strtolower($postObj->MsgType);

            switch($MsgType){
                /*
                 * 发送文本消息
                 * */
                case 'text':

                    $content="<a href='http://www.baidu.com'>发送文本消息</a>\nkdfjlskjdflskdj";

                    echo ResponseHelper::text($wp_openid,$wp_number,$content);

                    break;
                /*
                 * 事件推送，下面又分为菜单推送和二维码扫描等多个事件类型
                 * */
                case 'event':

                    //$event=strtolower($postObj->Event);

                    self::handleEvent($postObj,$wid);

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


    /*
     * 微信推送事件处理
     * */
    public static function handleEvent($postObj,$wid)
    {

        /*
         * 消息发送者的openid
         * */
        $wp_openid = $postObj->FromUserName;
        /*
         * 公众号
         * */
        $wp_number = $postObj->ToUserName;

        $event=strtolower($postObj->Event);

        switch($event){
            /*
             * 订阅公众号事件推送
             * */
            case 'subscribe':
                /* $eventkey 带参数二维码的参数，把前缀过滤掉了 */
                $eventkey=str_replace('qrscene_','',trim($postObj->EventKey));

                if($eventkey){
                    /*
                     * 扫码订阅公众号事件推送
                     * */

                    $content="<a href='http://www.baidu.com'>扫码订阅公众号了</a>\n感谢你".$eventkey;

                    echo ResponseHelper::text($wp_openid,$wp_number,$content);exit;
                }

                $content="<a href='http://www.baidu.com'>欢迎订阅公众号</a>\n感谢你".$eventkey;

                echo ResponseHelper::text($wp_openid,$wp_number,$content);


                break;
            /*
             * 取消订阅公众号事件推送
             * */
            case 'unsubscribe':

                \Yii::info('取消关注了'.date('Y-m-d H:i:s'),'wxlog');

                break;
            /*
             * 用户已关注时扫描带参数二维码的事件推送
             * */
            case 'scan':

                /* $eventkey 带参数二维码的参数，把前缀过滤掉了 */
                $eventkey=str_replace('qrscene_','',trim($postObj->EventKey));

                $content="<a href='http://www.baidu.com'>扫码了</a>\n感谢你".$eventkey;

                echo ResponseHelper::text($wp_openid,$wp_number,$content);exit;


                break;
            /*
             * 菜单点击事件
             * */
            case 'click':
                /*$eventkey 自定义菜单的时候写的key值 */
                $eventkey=trim($postObj->EventKey);

                if($eventkey=='fasong'){
                    $item=[];
                    for($i=0;$i<8;$i++){
                        $title='测试发送图文消息'.$i;
                        $desc ='测试一下发送图文消息行不行啊！不行的话我还要在测试的'.$i;
                        if($i%2==0){
                            $picUrl='http://326108993.com/upload/x00001/images/201607/26224415xa8bfb.png';
                        }else{
                            $picUrl='http://326108993.com/upload/x00001/images/201607/26224634x71818.jpg';
                        }
                        $url   ='http://www.baidu.com';
                        $item[$i]=ResponseHelper::newsItem($title,$desc,$picUrl,$url);
                    }
                    $content=ResponseHelper::news($wp_openid,$wp_number,$item);
                    echo $content;

                }elseif($eventkey=='ceshi'){

                    $content="<a href='http://www.baidu.com'>ceshi</a>\n感谢你".$eventkey;

                    echo \common\weixin\ResponseHelper::text($wp_openid,$wp_number,$content);

                }else{

                    $content="<a href='http://www.baidu.com'>lingwaidedongxi</a>\n感谢你".$eventkey;

                    echo \common\weixin\ResponseHelper::text($wp_openid,$wp_number,$content);
                }





                break;


        }
    }

}


