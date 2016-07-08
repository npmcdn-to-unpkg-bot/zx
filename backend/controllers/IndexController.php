<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2016/3/29
 * Time: 21:47
 */
namespace backend\controllers;
use yii\helpers\Url;
use yii\helpers\UHelper;

/**
 * Site controller
 */
class IndexController extends BaseController
{
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function actionIndex()
    {
        if(time()>\Yii::$app->user->identity->expire){
            UHelper::alert('帐号已过期','error');
        }else{
            $day=(int)floor((\Yii::$app->user->identity->expire-time())/(24*3600));
            UHelper::alert('您的帐号有效期还有'.$day.'天','success');
        }

        return $this->render('index');
    }

}