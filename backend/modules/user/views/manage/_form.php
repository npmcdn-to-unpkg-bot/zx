<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'disabled'=>true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'portrait')->widget(backend\widgets\JquploadWidget::className(),['data'=>$model->portrait]) ?>

    <?= $form->field($model, 'last_login_time')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDatetime($model->last_login_time)]) ?>

    <?= $form->field($model, 'last_login_ip')->textInput(['maxlength' => true,'disabled'=>true]) ?>

    <?= $form->field($model, 'login_times')->textInput(['disabled'=>true]) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true,'disabled'=>true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDate($model->created_at)]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDate($model->updated_at)]) ?>

    <?= $form->field($model, 'expire')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDate($model->expire)])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
