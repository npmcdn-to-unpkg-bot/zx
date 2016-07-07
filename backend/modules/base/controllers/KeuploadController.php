<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/26
 * Time: 10:03
 * kindeditor 文件上传
 */

namespace app\modules\base\controllers;

use common\helper\UHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\helpers\FileHelper;

class KeuploadController extends Controller
{

    public $enableCsrfValidation = false;
    public $file;


    public function actionIndex()
    {
        $request=\Yii::$app->request;
//        if(!$request->isAjax){
//            Json::ajaxreturn(['error'=>1,'message'=>'非法请求']);
//        }
        if(\Yii::$app->user->isGuest){
            Json::ajaxreturn(['error'=>1,'message'=>'请先登录']);
        }

        if($request->get('dir')!='image'){
            Json::ajaxreturn(['error'=>1,'message'=>'仅支持图片上传']);
        }

        $file = UploadedFile::getInstanceByName('imgFile');

        if($file->size>1024*1024){
            Json::ajaxreturn(['error' => 1, 'message' => '上传文件不得大于1M']);
        }

        $allow_ext=array('jpg', 'jpeg', 'png','gif');

        if (!in_array($file->getExtension(),$allow_ext)) {
            Json::ajaxreturn(['error' => 1, 'message' => '只能上传'.implode(",",$allow_ext).'格式的图片']);
        } else {
            $user_id = \Yii::$app->user->getId();
            $user_id = sprintf("%05d", $user_id);
            if (!$user_id) {
                $dirNo = "common/";
            } else {
                $dirNo = 'u' . $user_id . '/';
            }
            $date = date("Ymd", time()) . '/';
            $saveDir = \Yii::getAlias('@uploadroot') .'/'. $dirNo .'Kindeditor/' . $date;
            FileHelper::createDirectory($saveDir);
            $saveName = md5($file->getBaseName() . $file->getExtension()) . '_' . date('His', time()) . '.' . $file->getExtension();
            $url = $saveDir . $saveName;
            $file->saveAs($url);

            $returnDir=\Yii::getAlias('@upload') .'/'. $dirNo .'Kindeditor/' . $date;
            $return_url=$returnDir . $saveName;
            Json::ajaxreturn(['error' => 0,'url' => $return_url]);
        }
    }
}