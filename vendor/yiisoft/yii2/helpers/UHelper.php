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


}