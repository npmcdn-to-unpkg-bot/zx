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
     * 设置页面提示
     * */
    public static function tips($tips)
    {
        \Yii::$app->params['showtips']=true;
        \Yii::$app->params['tips']=$tips;
    }

    /*
     * 设置跳转提示flash
     * */
    public static function flash($msg)
    {
        \Yii::$app->session->setFlash('XQmTEP1cdaF3CT4O',$msg);
    }

    /*
     * 获取跳转提示
     * */
    public static function getFlash()
    {
        return \Yii::$app->session->getFlash('XQmTEP1cdaF3CT4O');
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
            /*
             * 删除图片
             * */
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
     * phpexcel生成需要的缓存文件
     *$title,$data 出入数组
     * */
    public static function phpexcelSetCache($title,$data,$cacheName){

        $cache=new \yii\caching\FileCache();


        $title=$cache->set('phpexceltitle_'.$cacheName,$title);

        $data=$cache->set('phpexceldata_'.$cacheName,$data);


    }

    /*
     *根据缓存的数据生成excel文件
     * */
    public static function downloadExcel($cacheName){

        $cache=new \yii\caching\FileCache();

        $title=$cache->get('phpexceltitle_'.$cacheName);
        $data=$cache->get('phpexceldata_'.$cacheName);


        require_once(\Yii::getAlias('@vendor').'/phpexcel/PHPExcel.php');

        // Create new PHPExcel object
        $objPHPExcel = new \PHPExcel();


        // Set document properties
        $objPHPExcel->getProperties()->setCreator("LURONGZE")
            ->setLastModifiedBy("LURONGZE")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

        /*
         * Add some data
         * */
        $letters=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        $sheet=$objPHPExcel->setActiveSheetIndex(0);

        /*
         * 设置头部信息
         * */
        foreach($title as $k=>$v){

            $sheet->setCellValue($letters[$k].'1', $v);

        }

        /*
         * 添加数据
         * */
        foreach($data as $key=>$value){
            $i=0;
            foreach($value as $k=>$v){

                $sheet->setCellValue($letters[$i].($key+2), $v);
                $i++;
            }
        }


        $cache->delete('phpexceltitle_'.$cacheName);

        $cache->delete('phpexceldata_'.$cacheName);


        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('导出时间：'.date('Y年m月d日H时i分s秒',time()));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }

    /*
     * 通过二级域名的用户名查找wid
     * 获取wid
     * */
    public static function getWebId()
    {

        $info=explode(".",\Yii::$app->request->getServerName());

        $cache=\Yii::$app->cache;

        $cacheValue=$cache->get($info[0].'LQiDNZ4STXa1aDy');

        if($cacheValue){

            $wid=$cacheValue;

        }else{

            $model=\common\models\table\User::find()->select('wid')->where(['name'=>$info[0]])->asArray()->one();

            $wid=$model['wid'];

            /*
             * 一般来说是不会变的，缓存一次就好了
             * */
            $cache->set($info[0].'LQiDNZ4STXa1aDy',$wid);

        }

        return $wid?$wid:1;
    }

}