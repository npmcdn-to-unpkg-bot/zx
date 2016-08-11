<?php
/**
 * Date: 2016/7/8
 * Time: 14:33
 */
namespace yii\helpers;
use yii\base\NotSupportedException;

/**
 *自己写的helper
 *
 */
class UHelper
{
    /*
     * 设置跳转信息
     * */
    public static function alert($msg,$success='original')
    {
        if($success=='success'){
            $msg="<span class='glyphicon glyphicon-ok-circle'></span>".$msg;
        }elseif($success=='error'){
            $msg="<span class='glyphicon glyphicon-remove-circle'></span>".$msg;
        }

        \Yii::$app->session->setFlash('AlertMsg',$msg);
    }

    /*
     * inpus widget 拿数据
     * */
    public static function w_inputs_post($data=['name','width','height'],$tojson=1)
    {
        $post=[];
        foreach($data as $k=>$v){
            $post[$v]=\Yii::$app->request->post($v);
        }
        $result=array();
        for($i=0;$i<count($post[$data[0]]);$i++){
            $barr=array();
            foreach($data as $kk=>$vv){
                $barr[$vv]=$post[$vv][$i];
            }
            $result[$i]=$barr;
        }
        return $tojson?\yii\helpers\Json::encode($result):$result;
    }

    /*
     * 图片上传
     * */
    public static function uploadimg($attribute,$size='',$type='images',$tojson=1)
    {
        $request = \Yii::$app->request;

        $file = \yii\web\UploadedFile::getInstanceByName($attribute . '_file_input');

        if(is_array($size)){
            $width=$size[0];
            $height=$size[1];
        }else{
            $width = $request->post($attribute . '_file_input_width');

            $height = $request->post($attribute . '_file_input_height');
        }

        if($request->post($attribute.'_file_input_uploadID')){
            $model=\common\models\table\Upload::find()->where(['id'=>$request->post($attribute.'_file_input_uploadID')])->one();
        }else{
            $model=new \common\models\table\Upload();
        }


        if($file){/*上传图片了就进入，没上传则直接返回信息就好了*/

            if($type=='file'){
                $allow_ext=array("png","jpg","jpeg","gif","bmp","flv","swf","mkv","avi",
                    "rm","rmvb","mpeg","mpg","ogg","ogv","mov","wmv","mp4","webm","mp3",
                    "wav","mid","rar","zip","tar","gz","7z","bz2","cab","iso","doc",
                    "docx","xls","xlsx","ppt","pptx","pdf","txt","md","xml"
                );
                $limitsize=10;
            }else{
                $allow_ext = array('jpg', 'jpeg', 'png', 'gif');
                $limitsize=2;
            }

            if ($file->size > 1024 * 1024 * $limitsize) {
                throw new \yii\web\ForbiddenHttpException('上传的图片不得大于'.$limitsize.'M');
            }


            if (!in_array($file->getExtension(), $allow_ext)) {

                throw new \yii\web\ForbiddenHttpException('只能上传' . implode(",", $allow_ext) . '格式的文件');

            } else {
                $user_id = \Yii::$app->user->getId();
                if (!$user_id) {

                    throw new \yii\web\ForbiddenHttpException('请先登录');

                } else {

                    $dirNo = 'x' . sprintf("%05d", $user_id) . '/';

                }

                $month = date("Ym", time()) . '/';

                $saveDir = \Yii::getAlias('@upload') . '/' . $dirNo . $type . '/' . $month;

                FileHelper::createDirectory($saveDir);

                $saveName = date('dHis', time()) . 'x' . substr(md5($file->getBaseName() . $file->getExtension()), 5, 5) . '.' . $file->getExtension();

                $path = $saveDir . $saveName;

                $file->saveAs($path);

                if ($width > 0 && $height > 0) {

                    \yii\imagine\Image::thumbnail($path, $width, $height)->save($path);

                    $size = filesize($path);
                } else {
                    $size = $file->size;
                }


                $returnDir = \Yii::getAlias('@uploadreturn') . '/' . $dirNo . $type . '/' . $month;

                $return_url = $returnDir . $saveName;

                /*删除原来的图片*/
                if($request->post($attribute.'_file_input_path')){
                    @unlink(\Yii::getAlias('@uiiroot').$request->post($attribute.'_file_input_path'));
                }

                $model->path=$info['path']=$return_url;
                $model->width=$info['width']=$width;
                $model->height=$info['height']=$height;
                $model->title=$info['title']=$request->post($attribute.'_file_input_title');
                $model->link=$info['link']=$request->post($attribute.'_file_input_link');
                $model->size=$info['size']=(string)$size;
                $model->mid=$request->post('mid');
                $model->cid=$request->post('id');
                $model->wid=\Yii::$app->user->identity->wid;
                $model->uid=\Yii::$app->user->getId();
                $model->isuse=1;
                $model->save();
                $info['uploadID']=$model->id;

            }
        }else{
            if($request->post($attribute.'_file_input_delete')){
                @unlink(\Yii::getAlias('@uiiroot').$request->post($attribute.'_file_input_path'));
                $model->delete();
                $info['path']='';
                $info['width']=0;
                $info['height']=0;
                $info['title']='';
                $info['link']='';
                $info['size']='';

            }else{
                $model->path=$info['path']=$request->post($attribute.'_file_input_path');
                $model->width=$info['width']=$width;
                $model->height=$info['height']=$height;
                $model->title=$info['title']=$request->post($attribute.'_file_input_title');
                $model->link=$info['link']=$request->post($attribute.'_file_input_link');
                $model->size=$request->post($attribute.'_file_input_size');
                $info['uploadID']=$request->post($attribute.'_file_input_uploadID');
                $model->save();
            }
        }

        return $tojson?\yii\helpers\Json::encode($info):$info;

    }


    /*
     * 文件上传
     * */
    public static function uploadfile($attribute,$limitsize=10,$type='file',$tojson=1)
    {
        $request = \Yii::$app->request;

        $file = \yii\web\UploadedFile::getInstanceByName($attribute . '_file_input');

        if($request->post($attribute.'_file_input_uploadID')){

            $model=\common\models\table\Upload::find()->where(['id'=>$request->post($attribute.'_file_input_uploadID')])->one();

        }else{

            $model=new \common\models\table\Upload();

        }


        if($file){/*上传文件了就进入，没上传则直接返回信息就好了*/

            $allow_ext=array("png","jpg","jpeg","gif","bmp","flv","swf","mkv","avi",
                "rm","rmvb","mpeg","mpg","ogg","ogv","mov","wmv","mp4","webm","mp3",
                "wav","mid","rar","zip","tar","gz","7z","bz2","cab","iso","doc",
                "docx","xls","xlsx","ppt","pptx","pdf","txt","md","xml"
            );

            if ($file->size > 1024 * 1024 * $limitsize) {
                throw new \yii\web\ForbiddenHttpException('上传的文件不得大于'.$limitsize.'M');
            }


            if (!in_array($file->getExtension(), $allow_ext)) {

                throw new \yii\web\ForbiddenHttpException('只能上传' . implode(",", $allow_ext) . '格式的文件');

            } else {
                $user_id = \Yii::$app->user->getId();
                if (!$user_id) {

                    throw new \yii\web\ForbiddenHttpException('请先登录');

                } else {

                    $dirNo = 'x' . sprintf("%05d", $user_id) . '/';

                }

                $month = date("Ym", time()) . '/';

                $saveDir = \Yii::getAlias('@upload') . '/' . $dirNo . $type . '/' . $month;

                FileHelper::createDirectory($saveDir);

                $saveName = date('dHis', time()) . 'x' . substr(md5($file->getBaseName() . $file->getExtension()), 5, 5) . '.' . $file->getExtension();

                $path = $saveDir . $saveName;

                $file->saveAs($path);

                $size = $file->size;

                $returnDir = \Yii::getAlias('@uploadreturn') . '/' . $dirNo . $type . '/' . $month;

                $return_url = $returnDir . $saveName;
                /*删除原来的文件*/
                if($request->post($attribute.'_file_input_path')){
                    @unlink(\Yii::getAlias('@uiiroot').$request->post($attribute.'_file_input_path'));
                }
                $model->path=$info['path']=$return_url;
                $model->title=$info['title']=$request->post($attribute.'_file_input_title');
                $model->link=$info['link']=$request->post($attribute.'_file_input_link');
                $model->size=$info['size']=(string)$size;
                $model->mid=$request->post('mid');
                $model->cid=$request->post('id');
                $model->wid=\Yii::$app->user->identity->wid;
                $model->uid=\Yii::$app->user->getId();
                $model->isuse=1;
                $model->save();
                $info['uploadID']=$model->id;

            }
        }else{
            if($request->post($attribute.'_file_input_delete')){
                @unlink(\Yii::getAlias('@uiiroot').$request->post($attribute.'_file_input_path'));
                $model->delete();
                $info['path']='';
                $info['title']='';
                $info['link']='';
                $info['size']='';
            }else{
                $model->path=$info['path']=$request->post($attribute.'_file_input_path');
                $model->title=$info['title']=$request->post($attribute.'_file_input_title');
                $model->link=$info['link']=$request->post($attribute.'_file_input_link');
                $model->size=$request->post($attribute.'_file_input_size');
                $info['uploadID']=$request->post($attribute.'_file_input_uploadID');
                $model->save();
            }
        }
        return $tojson?\yii\helpers\Json::encode($info):$info;
    }

    /*
     * 原有输出数据
     * */
    public static function pre($data,$print=true)
    {
        echo '<pre>';
            if($print){
                print_r($data);
            }else{
                var_dump($data);
            }
        echo '</pre>';
    }

    /*
     * 利用phpqrcode 生成二维码图片
     * */
    public static function qrcode($text='', $outfile = false, $box=[0,0] , $level = 3, $size = 20, $margin = 2, $saveandprint=false)
    {
        include \Yii::getAlias('@vendor').'/phpqrcode/phpqrcode.php';
        if($outfile){
            \yii\helpers\FileHelper::createDirectory(dirname($outfile));
        }
        \phpqrcode\QRcode::png($text,$outfile,$level,$size,$margin,$saveandprint);

        if($box[0]>0 && $box[1]>0){//修改图片尺寸
            \yii\imagine\Image::thumbnail($outfile,$box[0],$box[1])->save($outfile);
        }

    }


    /*
     * 生成需要的缓存文件
     *
     * */
    public static function phpexcelSetCache($title,$data,$page=0){

    }

    /*
     *根据缓存的数据生成excel文件
     * */
    public static function downloadExcel($page=0){





    }

}