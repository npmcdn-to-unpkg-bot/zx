<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2016/3/29
 * Time: 21:47
 */
namespace backend\controllers;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\UHelper;
use yii\web\ForbiddenHttpException;

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

            throw new ForbiddenHttpException('帐号已过期');exit;

        }else{
            $day=(int)floor((\Yii::$app->user->identity->expire-time())/(24*3600));
            UHelper::alert('您的帐号有效期还有'.$day.'天','success');
        }

        return $this->render('index');
    }

    public function actionDev()
    {



        \Yii::info('aaaaa',__METHOD__);



        if(\Yii::$app->cache->get('wwiiddqq')){
            echo \Yii::$app->cache->get('wwiiddqq').'****';
        }else{
            \Yii::$app->cache->set('wwiiddqq',time().'a',10);
        }

        if(\Yii::$app->wxcache->get('wx')){
            echo \Yii::$app->wxcache->get('wx');
        }else{
            \Yii::$app->wxcache->set('wx','hahaha-'.date('H:i:s',time()),10);
        }


        die;


        if(\Yii::$app->request->isPost){

            echo '<pre>';

            print_r(\Yii::$app->request->post());
            echo '</pre>';

            die;

        }

        return $this->render('dev');
    }

}