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



        die;


        if(\Yii::$app->request->isPost){

            echo '<pre>';

            print_r(\Yii::$app->request->post());
            echo '</pre>';

            die;

        }

        return $this->render('dev');
    }

    public function actionExcel()
    {
        $db = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=apivblcc',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ]);

        $data=$db->createCommand("SELECT `openid`,`name`,`tel`,`ctime` FROM doc_hlbm WHERE `name`<>'' and `openid`<>'' and `tel`<>'' ORDER BY `id` DESC")
            ->queryAll();

        $title=['openid字符串','姓名','电话','参与时间'];


        UHelper::phpexcelSetCache($title,$data,'phpexceltest');

        echo "<script>window.open('".\yii\helpers\Url::to(['/index/downloadexcel','cacheName'=>'phpexceltest'])."')</script>";
    }


    public function actionDownloadexcel($cacheName)
    {

        UHelper::downloadExcel($cacheName);

    }

}