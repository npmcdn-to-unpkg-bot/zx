<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/19
 * Time: 19:58
 */
namespace backend\assets;

use yii\web\AssetBundle;

class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'source/css/font-awesome.min.css',
        'source/css/beyond.min.css',
    ];
    public $js = [
        'source/js/beyond.min.js',
        'source/js/uii-common.js',
    ];
    public $jsOptions = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}