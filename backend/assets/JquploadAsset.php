<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2015/12/23
 * Time: 22:43
 */
namespace backend\assets;


use yii\web\AssetBundle;
class JquploadAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/jqupload/css/style.css',
    ];
    public $js = [
        'vendor/jqupload/js/vendor/jquery.ui.widget.js',
        'vendor/jqupload/js/jquery.iframe-transport.js',
        'vendor/jqupload/js/jquery.fileupload.js',
        'vendor/jqupload/js/zx.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'backend\assets\BackendAsset',
    ];
}