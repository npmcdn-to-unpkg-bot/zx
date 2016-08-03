<?php
/**
 * Date: 2016/8/3
 * Time: 11:43
 */
use yii\helpers\Html;

echo frontend\widgets\WxjsWidget::widget();

?>

<?= Html::a('修改分享','javascript:;',['class'=>'btn btn-default share-change'])?>


<script>
$(function(){

    $(".share-change").on('click',function(){

        zxWxShare('修改了分享的标题','<?=\Yii::$app->request->absoluteUrl?>','http://326108993.com/upload/x00001/images/201607/26224634x71818.jpg');
    });

})
</script>

