<?php
/**
 * Date: 2016/7/27
 * Time: 14:59
 * 微信设置
 */
namespace backend\controllers;

use Yii;
use common\models\table\Web;
use yii\base\Exception;
use yii\helpers\UHelper;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use backend\controllers\BaseController;
use common\weixin\WeixinHelper;
use yii\helpers\Json;


class WxController extends BaseController
{
    public function actionIndex()
    {

        $openid=WeixinHelper::oauth2(1,true);

        $wxinfo=WeixinHelper::openidInfo($openid);

        $info=\common\weixin\JssdkHelper::getSignPackage(1);

        return $this->render('index',[
            'info'=>$info,
            'wxinfo'=>$wxinfo,
        ]);
    }
    public function actionJssdk()
    {
        $signPackage=\common\weixin\JssdkHelper::getSignPackage(1);

        return $this->render('jssdk',[
            'signPackage'=>$signPackage,
        ]);
    }

    /*
     * 自定义菜单
     * */
    public function actionMenucreate($wid)
    {
        try{
            if(\Yii::$app->request->isAjax){

               // $data='{"button": [{"name": "扫00码","sub_button": [{"type": "scancode_waitmsg","name": "扫码带提示","key": "rselfmenu_0_0","sub_button": [ ]},{"type": "scancode_push","name": "扫码推事件","key": "rselfmenu_0_1","sub_button": [ ]}]},{"name": "发图片啊","sub_button": [{"type": "pic_sysphoto","name": "系统拍照发图","key": "rselfmenu_1_0","sub_button": [ ]},{"type": "pic_photo_or_album","name": "拍照或者相册发图","key": "rselfmenu_1_1","sub_button": [ ]},{"type": "pic_weixin","name": "微信相册发图","key": "rselfmenu_1_2","sub_button": [ ]}]},{"name": "发送位置","type": "location_select","key": "rselfmenu_2_0"}]}';
                $data=' {
                         "button":[
                         {
                              "type":"click",
                              "name":"今日歌曲",
                              "key":"V1001_TODAY_MUSIC"
                          },
                          {
                               "name":"菜单",
                               "sub_button":[
                               {
                                  "type":"click",
                                  "name":"fasong",
                                  "key":"fasong"
                              },
                                {
                                  "type":"click",
                                  "name":"ceshi",
                                  "key":"ceshi"
                              },
                                {
                                   "type":"click",
                                   "name":"123",
                                   "key":"123"
                                }]
                           }]
                     }';


                $return=WeixinHelper::menu_create($data,$wid);

            }else{
                throw new Exception('非法请求！');
            }
        }catch (Exception $e){
            unset($return);
            $return['msg']=$e->getMessage();
        }

        Json::ajaxreturn($return);
    }


    /*
     * 删除菜单
     * */
    public function actionMenudelete($wid)
    {
        try{
            if(\Yii::$app->request->isAjax){
                $return = WeixinHelper::menu_delete($wid);
            }else{
                throw new Exception('非法请求！');
            }
        }catch (Exception $e){
            unset($return);
            $return['msg']=$e->getMessage();
        }
        Json::ajaxreturn($return);
    }
}

