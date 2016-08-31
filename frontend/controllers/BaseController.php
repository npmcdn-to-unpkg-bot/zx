<?php
/**
 * Date: 2016/8/22
 * Time: 17:35
 */
namespace frontend\controllers;

use yii\helpers\UHelper;
use yii\web\Controller;
use yii\helpers\Url;

class BaseController extends Controller
{
    public function init()
    {
        parent::init();

        \Yii::$app->params['WEBID']=UHelper::getWebId();

        \Yii::$app->security->generateRandomString();
    }

    /*
     * 生成验证码
     * */
    public function actionGenverifycode($fontsize=12,$mask=false)
    {
        /*
         $verfy=new Verify();
         $code_check=$verfy->check($request['code']);
         * */
        $verify=new \yii\helpers\VerifyHelper([
            'fontSize'  =>  $fontsize,              // 验证码字体大小(px)
            'useCurve'  =>  $mask,            // 是否画混淆曲线
            'useNoise'  =>  $mask,            // 是否添加杂点
        ]);

        return $verify->entry();

    }



}