<?php
/**
 * Date: 2016/8/3
 * Time: 17:03
 */

namespace frontend\controllers;

use yii\helpers\UHelper;
use yii\web\Controller;
use yii\helpers\Url;

class IndexController extends BaseController
{


    public function actionIndex()
    {


       Uhelper::pre(\Yii::$app->request->get()) ;

        echo '<br/>';

       echo Url::to(['index/index','id'=>123123],true);die;



        return $this->renderPartial('index');
    }

    public function actionView(){


        UHelper::pre(\Yii::$app->request->get());

        UHelper::pre(\Yii::$app->params);

        echo Url::to(['index/view','id'=>54321],true);

    }

    public function actionEm()
    {
        echo \Yii::$app->request->get('idd');

        echo 123;die;

    }

}