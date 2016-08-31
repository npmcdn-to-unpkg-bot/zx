<?php
/**
 * Date: 2016/8/3
 * Time: 17:03
 */

namespace frontend\controllers;

use yii\helpers\UHelper;
use yii\web\Controller;
use yii\helpers\Url;
use frontend\controllers\BaseController;

class IndexController extends BaseController
{


    public function actionIndex()
    {

        $ch = curl_init();
        $url = 'http://apis.baidu.com/apistore/idservice/id?id=450881199105230037';
        $header = array(
            'apikey: 84e6516f4bd292817d00d0a402897659',
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);

        UHelper::pre(json_decode($res));


        return;

        return $this->render('index');
    }

    public function actionView(){


        $ch = curl_init();
        $url = 'http://apis.baidu.com/apistore/mobilenumber/mobilenumber?phone='.\Yii::$app->request->get('id');
        $header = array(
            'apikey: 84e6516f4bd292817d00d0a402897659',
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);

        UHelper::pre(json_decode($res));


        return;


        return $this->render('view');

    }

    public function actionDemo()
    {

        return $this->render('demo');
    }


}