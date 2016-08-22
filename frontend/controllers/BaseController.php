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

    }


}