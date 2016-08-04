<?php
/**
 * Date: 2016/8/3
 * Time: 17:03
 */

namespace frontend\controllers;

use yii\web\Controller;

class IndexController extends Controller
{


    public function actionIndex()
    {

        $files=\yii\helpers\FileHelper::findFiles(__DIR__.'/sougenpart');

        $sql='';

        $db = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=sougen',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ]);

//        foreach($files as $key=>$value){
//
//            $file=\yii\helpers\FileHelper::normalizePath($value);
//
//            $sql=file_get_contents($file);
//
//            $db->createCommand($sql)->execute();
//
//        }



        $start=\Yii::$app->cache->get('start123');

        if(!isset($start)){
            $start=0;
        }

        for($i=$start;$i<($start+1);$i++){

            $file=\yii\helpers\FileHelper::normalizePath($files[$i]);

            $table = str_replace('.sql','',basename($file));

            $sql='TRUNCATE '.$table;
            $db->createCommand($sql)->execute();

//            $sql=file_get_contents($file);

            $sql="source ".$file;

            $db->createCommand($sql)->execute();
        }

        \Yii::$app->cache->set('start123',$start+1);

        echo $start;
        die;





        return $this->renderPartial('index');
    }


}