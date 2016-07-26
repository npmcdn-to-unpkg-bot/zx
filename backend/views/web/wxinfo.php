<?php
/**
 * Date: 2016/7/26
 * Time: 11:09
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '微信设置: ' . $model->name;
?>
<div class="web-update">

<div class="web-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'wx_appid')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'wx_appsecret')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'wx_token')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'wx_aeskey')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'wx_merchant_number')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'wx_merchant_key')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'wx_apiclient_cert')->widget(backend\widgets\FileInputWidget::className(),['type'=>'file']) ?>

        <?= $form->field($model, 'wx_apiclient_key')->widget(backend\widgets\FileInputWidget::className(),['type'=>'file']) ?>

        <?= $form->field($model, 'wx_use')->radioList(['0'=>'不使用','1'=>'使用']) ?>

        <div style="display: none;">

            <?= $form->field($model, 'updated_at')->hiddenInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'admin')->hiddenInput() ?>
        </div>


        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>

</div>