<?php
/**
 * Date: 2016/7/27
 * Time: 14:37
 * 微信助手类
 */
namespace common\weixin;

use common\models\table\Web;
use yii\helpers\CurlHelper;
use common\weixin\Wxoauth2Helper;

class WeixinHelper
{

    const wx_access_token='https://api.weixin.qq.com/cgi-bin/token';

    const wx_menu_create='https://api.weixin.qq.com/cgi-bin/menu/create';

    const wx_menu_delete='https://api.weixin.qq.com/cgi-bin/menu/delete';

    /*
     * 获取access_token
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
    public static function oauth2($wid,$userinfo=false,$accept_cache=true)
    {
        $scope=$userinfo?'snsapi_userinfo':'snsapi_base';


        $request  = \Yii::$app->request;
        $response = \Yii::$app->response;
        $cache    = \Yii::$app->wxcache;

        /*
         *是否使用缓存，在确认需要获取用户最新的信息的时候需要设置为false
         * */
        if($accept_cache){

            $openid= \Yii::$app->request->cookies->get('wxoauth2_'.$scope.$wid);

            /*
             * openid 缓存还在的时候直接返回
             * */
            if($cache->get('wxoauth2_'.$wid.'_'.$openid)){
                return $openid;
            }
        }

        $model= Web::findOne($wid);

        if($model->wx_use){
            $appid=$model->wx_appid;
            $appsecret=$model->wx_appsecret;
        }else{
            $default=Web::findOne(1);
            $appid=$default->wx_appid;
            $appsecret=$default->wx_appsecret;
        }
        /*
         * 用户同意授权
         * */
        if($request->get('code')){

            $base_info=Wxoauth2Helper::getTokenAndOpenid($request->get('code'),$appid,$appsecret);

            $openid=$base_info['openid'];

            if($openid){
                $oauth2_info=\common\models\table\Oauth2::find()->where(['openid'=>$openid,])->one();

                if(!$oauth2_info->encrypt){
                    /*
                     * 新增或者是修改oauth2表的encrypt
                     * */
                    $insert_parame=array('openid'=>$info->openid,'appid'=>$appid,'appsecret'=>$appsecret);
                    $encrypt=self::getSign($insert_parame);

                    if($oauth2_info->id){
                        $oauth2_info->encrypt=$encrypt;
                        $oauth2_info->save();
                    }else{
                        $oauth2_new_info=new \common\models\table\Oauth2();
                        $oauth2_info->wid=$wid;
                        $oauth2_info->openid=$openid;
                        $oauth2_new_info->encrypt=$encrypt;
                        $oauth2_new_info->save();
                    }
                }
                /*
                 * 需要拿用户的信息的时候
                 * */
                if($scope=='snsapi_userinfo'){

                    $user_info=Wxoauth2Helper::getUserInfo($base_info['access_token'],$base_info['openid']);

                    $oauth2_info=\common\models\table\Oauth2::find()->where(['openid'=>$openid,])->one();
                    $oauth2_info->wxname=$user_info['nickname'];
                    $oauth2_info->wxpic=$user_info['headimgurl'];
                    $oauth2_info->sex =$user_info['sex'];
                    $oauth2_info->province=$user_info['province'];
                    $oauth2_info->city=$user_info['city'];
                    $oauth2_info->country=$user_info['country'];
                    $oauth2_info->privilege=$user_info['privilege'];
                    $oauth2_info->unionid=$user_info['unionid'];

                    $oauth2_info->save();

                }
            }else{
                return false;
            }

            \Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'wxoauth2_'.$scope.$wid,
                'value' => $openid,
            ]));

            $cache->set('wxoauth2_'.$wid.'_'.$openid,$openid,7000);

            return $openid;

        }else{
            /*
             * 跳转到授权页面
             * */
           return Wxoauth2Helper::getcode($request->absoluteUrl,$appid);
        }

    }


    /**
     * 	作用：生成签名
     */
    public static function getSign($Obj)
    {
        foreach ($Obj as $k => $v)
        {
            $Parameters[$k] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $buff='';
        foreach ($Parameters as $k => $v)
        {
            $buff .= $k . "=" . $v . "&";
        }
        $reqPar;
        if (strlen($buff) > 0)
        {
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        $String = $reqPar;
        //签名步骤三：MD5加密
        $String = md5($String);
        //echo "【string3】 ".$String."</br>";
        //签名步骤四：所有字符转为大写
        $result = strtoupper($String);
        //echo "【result】 ".$result_."</br>";
        return $result;
    }

    /*
     * 微信接入
     * */
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