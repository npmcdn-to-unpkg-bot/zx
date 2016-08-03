<?php
/**
 * Date: 2016/8/3
 * Time: 11:49
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class WxAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    ];
    public $js = [
        'http://res.wx.qq.com/open/js/jweixin-1.0.0.js',
    ];

    public $jsOptions=[
        'position' => \yii\web\View::POS_HEAD,
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}