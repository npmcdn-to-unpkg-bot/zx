<?php
/**
 * Date: 2016/8/3
 * Time: 17:03
 */

namespace frontend\controllers;

use yii\web\Controller;
use yii\helpers\Url;

class IndexController extends Controller
{


    public function actionIndex()
    {


       echo \Yii::$app->request->get('id');

        echo '<br/>';

       echo Url::to(['index/index','id'=>123123],true);die;



        return $this->renderPartial('index');
    }


    public function actionEm()
    {
        echo \Yii::$app->request->get('idd');

        echo 123;die;

    }

}