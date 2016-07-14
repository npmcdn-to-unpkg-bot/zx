<?php
/**
 * Date: 2016/7/11
 * Time: 17:10
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title='测试页面';


//echo backend\widgets\JquploadWidget::widget();
?>

<?php $form = ActiveForm::begin(); ?>

<?//echo backend\widgets\InputsWidget::widget(['format'=>['name'=>'nimei','width'=>'width','height'=>'height']]);?>

<?=backend\widgets\JquploadWidget::widget(['attribute'=>'tttt','label'=>'图片上传'])?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>






