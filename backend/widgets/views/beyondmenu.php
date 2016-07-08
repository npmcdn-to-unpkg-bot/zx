<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2015/12/26
 * Time: 20:44
 */
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
$dependency = [
    'class' => 'yii\caching\DbDependency',
    'sql' => 'SELECT MAX(updated_at) FROM {{%menu}} WHERE wid='.\Yii::$app->user->identity->wid,
];
?>

<?
if ($this->beginCache(\Yii::$app->user->identity->wid.'beyondadmin_menu',['dependency'=>$dependency])) {
?>
    <ul class="nav sidebar-menu">
        <li <?if($route=="system/index/index"){?>class="active"<?}?>>
            <a href="<?=Url::toRoute(['/index/index'])?>">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> 控制面板 </span>
            </a>
        </li>
        <li <?if($route=="system/menu/index"){?>class="active"<?}?>>
            <a href="<?=Url::toRoute(['/menu/index'])?>">
                <i class="menu-icon fa fa-th"></i>
                <span class="menu-text">菜单列表</span>
            </a>
        </li>
        <?=ArrayHelper::beyondmenu($data,$plist,\Yii::$app->request->get('mid'))?>
    </ul>
<?
    $this->endCache();
}
?>
<script>
$(function(){
    /***为当前菜单添加active,open类***/
    <?if(is_array($plist)){?>
        <?foreach($plist as $key=>$value){?>
        $("#beyondmenu<?=$value?>").addClass('open');
        <?}?>
    <?}?>
    $("#beyondmenu<?=\Yii::$app->request->get('mid')?>").addClass('active');
})
</script>
