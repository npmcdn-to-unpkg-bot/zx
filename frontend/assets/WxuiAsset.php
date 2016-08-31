<?php
/**
 * Date: 2016/8/29
 * Time: 16:20
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class WxuiAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        "vendor/weixinui/weixinui.css",
    ];
    public $js = [
        "vendor/weixinui/weixinui.js",
    ];

    public $jsOptions=[
        'position' => \yii\web\View::POS_HEAD,
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}