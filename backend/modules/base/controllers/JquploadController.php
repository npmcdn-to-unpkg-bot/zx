<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/28
 * Time: 14:01
 */

namespace app\modules\base\controllers;

/**
 * Jquoload 上传图片的响应类
 */
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\helpers\FileHelper;
use yii\imagine\Image;

class JquploadController extends Controller
{
    public $enableCsrfValidation = false;
    public $file;


    public function actionUploadimg()
    {
        $request=\Yii::$app->request;
        if(!$request->isAjax){
            Json::ajaxreturn(['state'=>'error','msg'=>'非法请求']);
        }
        if(\Yii::$app->user->isGuest){
            Json::ajaxreturn(['state'=>'error','msg'=>'请先登录']);
        }
        $file = UploadedFile::getInstanceByName('jqupload');

        if($file->size>1024*1024){
            Json::ajaxreturn(['state' => 'error', 'msg' => '上传文件不得大于1M']);
        }

        $allow_ext=array('jpg', 'jpeg', 'png','gif');

        if (!in_array($file->getExtension(),$allow_ext)) {
            Json::ajaxreturn(['state' => 'error', 'msg' => '只能上传'.implode(",",$allow_ext).'格式的图片']);
        } else {
            $user_id = \Yii::$app->user->getId();
            $user_id = sprintf("%05d", $user_id);
            if (!$user_id) {
                $dirNo = "common/";
            } else {
                $dirNo = 'u' . $user_id . '/';
            }
            $date = date("Ymd", time()) . '/';
            $saveDir = \Yii::getAlias('@uploadroot') .'/'. $dirNo .'Images/' . $date;
            FileHelper::createDirectory($saveDir);
            $saveName = md5($file->getBaseName() . $file->getExtension()) . '_' . date('His', time()) . '.' . $file->getExtension();
            $url = $saveDir . $saveName;
            $file->saveAs($url);
            $width=$request->post("width");
            $height=$request->post("height");
            if($width>0 && $height>0){
                Image::thumbnail($url,$width,$height)->save($url);
            }
            $returnDir=\Yii::getAlias('@upload') .'/'. $dirNo .'Images/' . $date;
            $return_url=$returnDir . $saveName;
            Json::ajaxreturn(['state' => 'success', 'msg' => '上传成功', 'url' => $return_url]);
        }
    }

    public function actionDelete(){

        $request=\Yii::$app->request;
        if(!$request->isAjax){
            Json::ajaxreturn(['state'=>'error','msg'=>'非法请求']);
        }
        if(\Yii::$app->user->isGuest){
            Json::ajaxreturn(['state'=>'error','msg'=>'请先登录']);
        }
        $path=$request->post("path");

        $fullpath=\Yii::getAlias('@uiiroot').$path;//找到绝对路径

        if(!is_file($fullpath)){
            $return['msg']='文件已丢失，请重新上传';
        }else{
            $return['msg']='删除成功';
        }
        @unlink($fullpath);
        $return['state']='success';
        Json::ajaxreturn($return);
    }

    /*和actionUploadimg 类似,只是为了方便分开而已*/
    public function actionUploadfile()
    {

        $request=\Yii::$app->request;
        if(!$request->isAjax){
            Json::ajaxreturn(['state'=>'error','msg'=>'非法请求']);
        }
        if(\Yii::$app->user->isGuest){
            Json::ajaxreturn(['state'=>'error','msg'=>'请先登录']);
        }
        $file = UploadedFile::getInstanceByName('jquploadfile');


        if($file->size>1024*1024*60){
            Json::ajaxreturn(['state' => 'error', 'msg' => '上传文件不得大于60M']);
        }

        $allow_ext=array("png","jpg","jpeg","gif","bmp","flv","swf","mkv","avi","rm","rmvb","mpeg","mpg","ogg","ogv","mov","wmv","mp4","webm","mp3","wav","mid","rar","zip","tar","gz","7z","bz2","cab","iso","doc","docx","xls","xlsx","ppt","pptx","pdf","txt","md","xml");

        if (!in_array($file->getExtension(), $allow_ext)) {
            Json::ajaxreturn(['state' => 'error', 'msg' => '只能上传'.implode(",",$allow_ext).'格式的文件']);
        } else {
            $user_id = \Yii::$app->user->getId();
            $user_id = sprintf("%05d", $user_id);
            if (!$user_id) {
                $dirNo = "common/";
            } else {
                $dirNo = 'u' . $user_id . '/';
            }
            $date = date("Ymd", time()) . '/';

            $saveDir = \Yii::getAlias('@uploadroot') .'/'. $dirNo .'Files/'. $date;
            FileHelper::createDirectory($saveDir);

            $returnDir = \Yii::getAlias('@upload') .'/'. $dirNo .'Files/'. $date;

            $saveName=md5($file->getBaseName() . $file->getExtension()) . '_' . date('His', time()) . '.' . $file->getExtension();

            $url = $saveDir . $saveName;

            $return_url=$returnDir .$saveName;

            $file->saveAs($url);

            $size=ceil(($file->size/1024));
            if($size>1024){
                $size=sprintf("%.2f", ($size/1024))."M";
            }else{
                $size=$size."K";
            }
            Json::ajaxreturn(['state' => 'success', 'msg' => '上传成功','filename'=>$file->name , 'url' => $return_url,'size'=>$size]);
        }
    }
}