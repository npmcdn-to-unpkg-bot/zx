<?php
/**
 * Date: 2016/7/8
 * Time: 14:33
 */
namespace yii\helpers;

/**
 *自己写的helper
 *
 */
class UHelper
{
    /*设置跳转信息*/
    public static function alert($msg,$success='original'){
        if($success=='success'){
            $msg="<span class='glyphicon glyphicon-ok-circle'></span>".$msg;
        }elseif($success=='error'){
            $msg="<span class='glyphicon glyphicon-remove-circle'></span>".$msg;
        }

        \Yii::$app->session->setFlash('AlertMsg',$msg);
    }

    /*inpus widget 拿数据*/
    public static function w_inputs_post($data=['name','width','height'],$tojson=1){
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
        return $tojson?Json::encode($result):$result;
    }


}