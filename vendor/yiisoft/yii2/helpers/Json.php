<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

/**
 * Json is a helper class providing JSON data encoding and decoding.
 * It enhances the PHP built-in functions `json_encode()` and `json_decode()`
 * by supporting encoding JavaScript expressions and throwing exceptions when decoding fails.
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Json extends BaseJson
{
    public static function ajaxreturn($data,$json_option=320){
        // 返回JSON数据格式到客户端 包含状态信息
        header('Content-Type:application/json; charset=utf-8');
        exit(self::encode($data,$json_option));
    }
}
