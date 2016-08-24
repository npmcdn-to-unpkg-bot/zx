<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2015/12/26
 * Time: 20:44
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$dependency = [
    'class' => 'yii\caching\DbDependency',
    'sql' => 'SELECT MAX(updated_at) FROM {{%menu}} WHERE wid='.\Yii::$app->user->identity->wid,
];
?>

<?php
if ($this->beginCache(\Yii::$app->user->identity->wid.'beyondadmin_menu',['dependency'=>$dependency,'cache'=>'htmlcache'])) {
?>
    <ul class="nav sidebar-menu">
        <li <?php if($route=="system/index/index"){?>class="active"<?php }?>>
            <a href="<?=Url::toRoute(['/index/index'])?>">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> 控制面板 </span>
            </a>
        </li>
        <li <?php if($route=="system/menu/index"){?>class="active"<?php }?>>
            <a href="<?=Url::toRoute(['/menu/index'])?>">
                <i class="menu-icon fa fa-th"></i>
                <span class="menu-text">菜单列表</span>
            </a>
        </li>
        <?=ArrayHelper::beyondmenu($data,$plist,\Yii::$app->request->get('mid'))?>
    </ul>
<?php
    $this->endCache();
}?>
<script>
$(function(){
    /***为当前菜单添加active,open类***/
    <?php if(is_array($plist)){?>
        <?php foreach($plist as $key=>$value){?>
        $("#beyondmenu<?=$value?>").addClass('open');
        <?php }?>
    <?php }?>
    $("#beyondmenu<?=\Yii::$app->request->get('mid')?>").addClass('active');
})
</script>
