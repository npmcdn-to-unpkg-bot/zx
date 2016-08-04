<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

/**
 * File system helper
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Alex Makarov <sam@rmcreative.ru>
 * @since 2.0
 */
class FileHelper extends BaseFileHelper
{

    /*
     * 根据文件路径返回文件名
     * @parame $path 文件路径
     * @parame $extenstion 是否返回扩展名
     * */
    public static function filename($path,$extenstion=true)
    {

        $path=self::normalizePath($path);

        $filename=basename($path);

        if(!$extenstion){

            $nameArray=explode(".",$filename);

            $extenstion=end($nameArray);

            $filename=str_replace(".".$extenstion,'',$filename);
        }

        return $filename;

    }

    /*
     * 根据文件路径返回文件目录
     * */
    public static function dirname($path)
    {
        $path=self::normalizePath($path);

        return dirname($path);
    }

}
