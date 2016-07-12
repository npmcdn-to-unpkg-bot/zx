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
        if(\Yii::$app->request->isPost){
            $data=\yii\helpers\UHelper::w_inputs_post(['name','width','height']);

            echo '<pre>';

            print_r($data);
            echo '</pre>';

        }

        return $this->render('dev');
    }

}