<?php
/**
 * Date: 2016/7/11
 * Time: 17:10
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;



//echo backend\widgets\JquploadWidget::widget();
?>

<?php $form = ActiveForm::begin(); ?>

<?echo backend\widgets\InputsWidget::widget(['format'=>['name'=>'nimei','width'=>'width','height'=>'height']]);?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


