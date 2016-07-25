<?php
/**
 * Date: 2016/7/16
 * Time: 15:50
 */
namespace backend\assets;


use yii\web\AssetBundle;
class DatetimePickerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/datetimepicker/css/bootstrap-datetimepicker.min.css'
    ];
    public $js = [
        'vendor/datetimepicker/js/bootstrap-datetimepicker.min.js',
        'vendor/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js',
    ];

    public $jsOptions=[
        'position' => \yii\web\View::POS_HEAD,
    ];

    public $depends = [

    ];
}