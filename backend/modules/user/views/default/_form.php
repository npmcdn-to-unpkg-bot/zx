<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\components\JquploadWidget;

/* @var $this yii\web\View */
/* @var $model app\models\table\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['enableClientValidation'=>true]); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'user_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_nickname')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'user_portrait')->render(JquploadWidget::widget(['data'=>[
       ['label'=>'头像上传','width'=>'100','height'=>'100','link'=>'','url'=>$model->user_portrait,'name'=>'User[user_portrait]']
   ]]))?>


    <?if(!$model->isNewRecord){?>
        <?= $form->field($model, 'create_time')->textInput(['readonly'=>true,'maxlength' => true,'value'=>Yii::$app->formatter->asDate($model->create_time)]) ?>

        <?= $form->field($model, 'last_login_time')->textInput(['readonly'=>true,'maxlength' => true,'value'=>Yii::$app->formatter->asDate($model->last_login_time)]) ?>

        <?= $form->field($model, 'last_login_ip')->textInput(['readonly'=>true,'maxlength' => true]) ?>

        <?= $form->field($model, 'login_times')->textInput(['readonly'=>true]) ?>
    <?}?>



    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'user_role')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
