<?php
/**
 * Date: 2016/7/27
 * Time: 14:37
 * 微信助手类
 */
namespace yii\helpers;

use common\models\table\Web;
use yii\helpers\CurlHelper;

class WeixinHelper
{

    const wx_access_token='https://api.weixin.qq.com/cgi-bin/token';

    const wx_menu_create='https://api.weixin.qq.com/cgi-bin/menu/create';

    const wx_menu_delete='https://api.weixin.qq.com/cgi-bin/menu/delete';

    /*
     * 获取access_token
     * url:wx_access_token
     * */
    public static function access_token($wid)
    {
        if($access_token=\Yii::$app->wxcache->get('wx_access_token_'.$wid)){
            return $access_token;
        }else{
            $model=Web::findOne($wid);
            $parame['grant_type']='client_credential';
            $parame['appid']=$model->wx_appid;
            $parame['secret']=$model->wx_appsecret;
            $return=CurlHelper::callWebServer(self::wx_access_token,$parame);
            \Yii::info($return,__METHOD__);
            \Yii::$app->wxcache->set('wx_access_token_'.$wid,$return['access_token'],$return['expires_in']-200);
            return $return['access_token'];
        }
    }

    /*
     * 新建自定义菜单
     * url:wx_menu_create
     * */
    public static function menu_create($data,$wid)
    {
        $url=self::wx_menu_create.'?access_token='.self::access_token($wid);
        $return=CurlHelper::callWebServer($url,$data,'post');
        return $return;
    }

    /*
     * 删除自定义菜单
     * url:wx_menu_delete
     * */
    public static function menu_delete($wid)
    {
        $url=self::wx_menu_delete.'?access_token='.self::access_token($wid);
        $return=CurlHelper::callWebServer($url,'','get');
        return $return;
    }

    /*
     * 微信网页授权
     * */
    public static function oauth2($wid,$scope="snsapi_base")
    {
        $request  = \Yii::$app->request;
        $response = \Yii::$app->response;
        $cache    = \Yii::$app->wxcache;

        $openid= $request->cookies('wxoauth2_'.$wid);

        if($cache->get('wxoauth2_'.$wid.'_'.$openid)){
            return $openid;
        }

        $model= Web::findOne($wid);

        if($model->wx_use){
            $appid=$model->wx_appid;
            $appsecret=$model->wx_appsecret;
        }else{
            $appid='';
            $appsecret='';
        }

        if(!$cache->get('wxoauth2_'.$wid.'_'.$openid)){

            http_redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect');
        }








    }




    public static function checkSignature($wid)
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