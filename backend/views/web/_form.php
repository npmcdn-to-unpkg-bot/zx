<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\table\Web */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->widget(backend\widgets\FileInputWidget::className(),['width'=>200,'height'=>200]) ?>

    <?= $form->field($model, 'smtp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput(['value'=>\Yii::$app->formatter->asDatetime($model->created_at),'disabled'=>'disabled','maxlength' => true]) ?>


    <div style="display: none;">

        <?= $form->field($model, 'updated_at')->hiddenInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'admin')->hiddenInput() ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
