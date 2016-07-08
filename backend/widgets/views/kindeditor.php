<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/25
 * Time: 15:58
 */
use yii\helpers\Html;
use backend\assets\KindeditorAsset;

KindeditorAsset::register($this);
?>


<?=Html::activeTextarea($model, $attribute,['class'=>'kindeditor','data-uploadjson'=>\yii\helpers\Url::toRoute(['/base/keupload/index'])])?>
