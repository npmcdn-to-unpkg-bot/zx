<?php
/* @var $this yii\web\View */

use yii\helpers\Url;


$this->title='控制面板';

$list=[
    [
        'title'=>'控制面板',
        'url'=>Url::toRoute(['index/index']),
        'icon_class'=>'glyphicon glyphicon-home',
        'desc'=>'进入控制面板，管理后台功能',
        'show'=>1,
    ],
    [
        'title'=>'菜单管理',
        'url'=>Url::toRoute(['menu/index']),
        'icon_class'=>'glyphicon glyphicon-link',
        'desc'=>'菜单管理，可以新增，修改，删除菜单',
        'show'=>1,
    ],
    [
        'title'=>'公众号配置',
        'url'=>Url::toRoute(['wxconfig/update']),
        'icon_class'=>'glyphicon glyphicon-pushpin',
        'desc'=>'公众号信息配置，包括appid，appsecret等',
        'show'=>1,
    ],
    [
        'title'=>'子网站配置',
        'url'=>Url::toRoute(['web/update']),
        'icon_class'=>'glyphicon glyphicon-pushpin',
        'desc'=>'子网站信息配置，包括名称，LOGO，关键字，描述等',
        'show'=>1,
    ],
    [
        'title'=>'插件管理',
        'url'=>Url::toRoute(['/developer/plug/index']),
        'icon_class'=>'glyphicon glyphicon-wrench',
        'desc'=>'管理插件，可以新增，修改插件的基本配置',
        'show'=>\Yii::$app->user->identity->role=='DEVELOPER'?1:0,
    ],
];


?>
<div class="row">
    <?php foreach($list as $k=>$v){
        if($v['show']<1){continue;}
    ?>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <a href="<?=$v['url']?>"class="databox databox-lg radius-bordered databox-shadowed">
                <div class="databox-left"><div class="databox-sparkline">
                        <span class="<?=$v['icon_class']?>"></span>
                    </div></div>
                <div class="databox-right bordered-thick bordered-uii-left-index bg-white">
                    <span class="databox-number sky"><?=$v['title']?></span>
                    <div class="databox-text darkgray"><?=$v['desc']?></div>
                </div>
            </a>
        </div>
    <?php }?>
</div>