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
use yii\base\Exception;
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
        $return['error']=0;
        try{
            if(\Yii::$app->user->isGuest){
                throw new Exception('请先登录');
            }

            if($request->get('dir')!='image'){
                throw new Exception('仅支持图片上传');
            }

            $file = UploadedFile::getInstanceByName('imgFile');

            if($file->size>1024*1024){
                throw new Exception('上传文件不得大于1M');
            }

            $allow_ext=array('jpg', 'jpeg', 'png','gif');

            if (!in_array($file->getExtension(),$allow_ext)) {
                throw new Exception('只能上传'.implode(",",$allow_ext).'格式的图片');
            } else {
                $user_id = \Yii::$app->user->getId();
                $user_id = sprintf("%05d", $user_id);
                if (!$user_id) {
                    $dirNo = "common/";
                } else {
                    $dirNo = 'x' . sprintf("%05d", $user_id) . '/';
                }

                $month = date("Ym", time()) . '/';

                $saveDir = \Yii::getAlias('@upload') . '/' . $dirNo . 'kindeditor/' . $month;

                FileHelper::createDirectory($saveDir);

                $saveName = date('dHis', time()) . 'x' . substr(md5($file->getBaseName() . $file->getExtension()), 5, 5) . '.' . $file->getExtension();

                $path = $saveDir . $saveName;

                $file->saveAs($path);

                $returnDir = \Yii::getAlias('@uploadreturn') . '/' . $dirNo . 'kindeditor/' . $month;

                $return['url'] = $returnDir . $saveName;

            }
        }catch (Exception $e){
                $return['error']=1;
                $return['msg']=$e->getMessage();
        }

        Json::ajaxreturn($return);
    }
}