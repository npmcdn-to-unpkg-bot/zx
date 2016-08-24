<?php
/**
 * Date: 2016/8/2
 * Time: 15:33
 * jssdk
 */
namespace common\weixin;

use common\weixin\WeixinHelper;
use yii\helpers\CurlHelper;

class JssdkHelper
{
    const wx_get_jsapi_ticket="https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=";



    public static function getSignPackage($wid) {
        $jsapiTicket = self::getJsApiTicket($wid);

        // 注意 URL 一定要动态获取，不能 hardcode.
        $url=\Yii::$app->request->absoluteUrl;

        $timestamp = time();

        $nonceStr = \Yii::$app->security->generateRandomString(16);

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $model=\common\models\table\Web::find()->where(['id'=>$wid])->select('wx_appid')->one();

        $signPackage = array(
            "appId"     => $model->wx_appid,
            "nonceStr"  => $nonceStr,
            "timestamp" => $timestamp,
            "url"       => $url,
            "signature" => $signature,
            "rawString" => $string
        );
        return $signPackage;
    }

    private static function getJsApiTicket($wid)
    {
        $cache=\Yii::$app->cache;

        if($api_ticket=$cache->get('wx_js_api_ticket_'.$wid)){

            return $api_ticket;

        }else{
            $accessToken= WeixinHelper::accessToken($wid);

            $ticket = CurlHelper::callWebServer(self::wx_get_jsapi_ticket.$accessToken);


            $cache->set('wx_js_api_ticket_'.$wid,$ticket['ticket'],7000);

            return $ticket['ticket'];
        }
    }



}