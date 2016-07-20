<?php
/**
 * Date: 2016/7/16
 * Time: 15:34
 */

backend\assets\DatetimePickerAsset::register($this);


?>

<?=yii\helpers\Html::activeInput('text',$model,$attribute,['class'=>'form-control','id'=>$attribute.'_datetimepicker','readonly'=>'readonly'])?>

<script>
$(function(){
    $('#<?=$attribute?>_datetimepicker').datetimepicker(<?=json_encode($config)?>);
})
</script>