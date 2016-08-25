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


        return $this->renderPartial('index');
    }

    public function actionView(){


        $cache=\Yii::$app->cache;


        return $this->render('view');

    }

    public function actionDemo()
    {

        return $this->render('demo');
    }


}