<?php
/**
 * Date: 2016/8/24
 * Time: 11:46
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<div class="signup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="signup-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model,'title')->textInput()?>

        <?= $form->field($model,'limit')->textInput()?>

        <?= $form->field($model,'stime')->widget(\backend\widgets\DatetimeWidget::className())?>

        <?= $form->field($model,'etime')->widget(\backend\widgets\DatetimeWidget::className())?>

        <div style="display: none;">

            <?= $form->field($model, 'wid')->hiddenInput() ?>

            <?= $form->field($model,'mid')->hiddenInput()?>

            <?= $form->field($model, 'created_at')->hiddenInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'updated_at')->hiddenInput(['maxlength' => true]) ?>

        </div>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '新增' : '保存', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>