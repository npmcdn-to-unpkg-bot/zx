<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\WebSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'admin') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'config') ?>

    <?php // echo $form->field($model, 'wx_appid') ?>

    <?php // echo $form->field($model, 'wx_appsecret') ?>

    <?php // echo $form->field($model, 'wx_merchant_number') ?>

    <?php // echo $form->field($model, 'wx_merchant_key') ?>

    <?php // echo $form->field($model, 'wx_apiclient_cert') ?>

    <?php // echo $form->field($model, 'wx_apiclient_key') ?>

    <?php // echo $form->field($model, 'wx_use') ?>

    <?php // echo $form->field($model, 'wxinfo') ?>

    <?php // echo $form->field($model, 'smtp') ?>

    <?php // echo $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
