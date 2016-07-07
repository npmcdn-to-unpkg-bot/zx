<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/19
 * Time: 21:04
 */
namespace backend\assets;

use yii\web\AssetBundle;
class BackheadAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'source/js/skins.min.js',
    ];

    public $jsOptions=[
        'position' => \yii\web\View::POS_HEAD,
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}