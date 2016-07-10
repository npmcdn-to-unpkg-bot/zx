<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\table\Tmp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'is_use')->radioList(['0'=>'停用','1'=>'启用']) ?>

    <?= $form->field($model, 'short')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'images')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'configs')->textarea(['rows' => 6]) ?>



    <?//= $form->field($model, 'imageset')->textarea(['rows' => 6]) ?>
    
    
    <div style="display: none;">

        <?= $model->isNewRecord?$form->field($model, 'plugid')->hiddenInput(['value'=>\Yii::$app->request->get('plugid')]):$form->field($model, 'plugid')->hiddenInput()  ?>

        <?= $form->field($model, 'created_at')->hiddenInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'updated_at')->hiddenInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tmpid')->hiddenInput() ?>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
