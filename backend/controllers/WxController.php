<?php
/**
 * Date: 2016/7/27
 * Time: 14:59
 */
namespace backend\controllers;

use Yii;
use common\models\table\Web;
use yii\helpers\UHelper;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use backend\controllers\BaseController;
use yii\helpers\WeixinHelper;
use yii\helpers\Json;


class WxController extends BaseController
{
    public function actionIndex()
    {

        return $this->render('index');
    }
    /*
     * 自定义菜单
     * */
    public function actionMenucreate($wid)
    {
        $data='{
                    "button": [
                        {
                            "name": "扫00码",
                            "sub_button": [
                                {
                                    "type": "scancode_waitmsg",
                                    "name": "扫码带提示",
                                    "key": "rselfmenu_0_0",
                                    "sub_button": [ ]
                                },
                                {
                                    "type": "scancode_push",
                                    "name": "扫码推事件",
                                    "key": "rselfmenu_0_1",
                                    "sub_button": [ ]
                                }
                            ]
                        },
                        {
                            "name": "发图片啊",
                            "sub_button": [
                                {
                                    "type": "pic_sysphoto",
                                    "name": "系统拍照发图",
                                    "key": "rselfmenu_1_0",
                                   "sub_button": [ ]
                                 },
                                {
                                    "type": "pic_photo_or_album",
                                    "name": "拍照或者相册发图",
                                    "key": "rselfmenu_1_1",
                                    "sub_button": [ ]
                                },
                                {
                                    "type": "pic_weixin",
                                    "name": "微信相册发图",
                                    "key": "rselfmenu_1_2",
                                    "sub_button": [ ]
                                }
                            ]
                        },
                        {
                            "name": "发送位置",
                            "type": "location_select",
                            "key": "rselfmenu_2_0"
                        },
                    ]
                }';
        $return=WeixinHelper::menu_create($data,$wid);

        Json::ajaxreturn($return);
    }


    /*
     * 删除菜单
     * */
    public function actionMenudelete($wid)
    {
        $return = WeixinHelper::menu_delete($wid);
        Json::ajaxreturn($return);
    }
}

