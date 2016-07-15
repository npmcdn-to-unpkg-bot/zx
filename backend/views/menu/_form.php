<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\table\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'pid')
        ->dropDownList($menuList,['options'=>[$model->id=>['disabled' => true]]])
        ->label('父级菜单')
    ?>

    <?= $form->field($model, 'type')
        ->dropDownList($plugList,['options'=>[$model->id=>['disabled' => true]]])
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model,'img_menu')->widget(backend\widgets\FileInputWidget::className(),['width'=>100,'height'=>100]);?>

    <?= $form->field($model,'img_smenu')->widget(backend\widgets\FileInputWidget::className(),['width'=>100,'height'=>100]);?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <?= $form->field($model, 'is_open')->radioList(['0'=>'不启用','1'=>'启用']) ?>




    <div style="display: none;">
        <?= $form->field($model, 'wid')->hiddenInput(['value'=>Yii::$app->user->identity->wid]) ?>

        <?= $form->field($model, 'created_at')->hiddenInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'updated_at')->hiddenInput(['maxlength' => true]) ?>

        <?//= $form->field($model, 'configs')->textarea(['rows' => 6]) ?>

        <?//= $form->field($model, 'configdata')->textarea(['rows' => 6]) ?>

        <?//= $form->field($model, 'configimg')->textarea(['rows' => 6]) ?>

        <?//= $form->field($model, 'share')->textarea(['rows' => 6]) ?>

        <?//= $form->field($model, 'seo')->textarea(['rows' => 6]) ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
