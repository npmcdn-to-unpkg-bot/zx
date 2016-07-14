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
use yii\base\Exception;
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
        $return['success']=true;
        try{
            if(!$request->isAjax){
                throw new Exception('非法请求');
            }
            if(\Yii::$app->user->isGuest){
                throw new Exception('请先登录');
            }

            $file = UploadedFile::getInstanceByName('jqupload');

            if($file->size>1024*1024*2){
                throw new Exception('上传的图片不得大于2M');
            }

            $allow_ext=array('jpg', 'jpeg', 'png','gif');

            if (!in_array($file->getExtension(),$allow_ext)) {

                throw new Exception('只能上传'.implode(",",$allow_ext).'格式的图片');

            } else {
                $user_id = \Yii::$app->user->getId();
                if (!$user_id) {

                    throw new Exception('请先登录');

                } else {

                    $dirNo = 'x' . sprintf("%05d", $user_id) . '/';

                }

                $month = date("Ym", time()) . '/';

                $saveDir = \Yii::getAlias('@upload') .'/'. $dirNo .'Images/' . $month;

                FileHelper::createDirectory($saveDir);

                $saveName =  date('dHis', time()). 'x' . substr(md5($file->getBaseName() . $file->getExtension()),5,5) . '.' . $file->getExtension();

                $path = $saveDir . $saveName;

                $file->saveAs($path);

                $width=$request->post("width");

                $height=$request->post("height");

                if($width>0 && $height>0){

                    Image::thumbnail($path,$width,$height)->save($path);

                    $size=filesize($path);
                }else{
                    $size=$file->size;
                }



                $returnDir=\Yii::getAlias('@uploadreturn') .'/'. $dirNo .'Images/' . $month;

                $return_url=$returnDir . $saveName;

                /*插入数据库*/


                if($request->post('imgid')){
                    $model=\common\models\table\Images::find()->where(['wid'=>\Yii::$app->user->identity->wid,'id'=>$request->post('imgid')])->one();

                    unlink(\Yii::getAlias('@uiiroot').$model->path);
                    $model->isuse=1;
                }else{
                    $model=new \common\models\table\Images();
                    $model->isuse=0;
                }
                $size=ceil(($size/1024));
                if($size>1024){$size=sprintf("%.2f", ($size/1024))."M";}else{$size=$size."K";}

                $model->size=$size;
                $model->wid=$data['wid']=\Yii::$app->user->identity->wid;
                $model->mid=$data['mid']=$request->post('mid');
                $model->cid=$data['cid']=$request->post('cid');
                $model->type=$data['type']='Jquery-Upload';
                $model->uid=$data['uid'] =$user_id;
                $model->title=$data['title']=$request->post('title');
                $model->link=$data['link']=$request->post('link');
                $model->path=$data['path']=$return_url;
                $model->width=$width?$width:0;
                $model->height=$height?$height:0;

                $model->save();

                $return['path']=$return_url;

                $return['size']=$model->size;
                $return['imgid']=$model->id;

                $return['info']=[
                    'title'=>$model->title,
                    'path' =>$model->path,
                    'link' =>$model->link,
                    'width'=>$model->width,
                    'height'=>$model->height,
                    'size' =>$model->size,
                    'imgid'=>$model->id,
                ];

            }
        }catch (Exception $e){
            $return['success']=false;

        }
        Json::ajaxreturn($return);
    }


    public function actionUploadimg1()
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