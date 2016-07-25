<?php

use backend\widgets\FileInputWidget;
use backend\widgets\KindeditorWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\table\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_list')->widget(FileInputWidget::className()) ?>

    <?= $form->field($model, 'img_title')->widget(FileInputWidget::className()) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(KindeditorWidget::className()) ?>

    <?= $form->field($model, 'pubtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isopen')->radioList(['0'=>'不显示','1'=>'显示']) ?>

    <?= $form->field($model, 'isrecommend')->radioList(['0'=>'不推荐','1'=>'推荐']) ?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

<!--    --><?//= $form->field($model, 'catid')->textInput() ?>

<!--    --><?//= $form->field($model, 'seo')->textarea(['rows' => 6]) ?>
<!---->
<!--    --><?//= $form->field($model, 'share')->textarea(['rows' => 6]) ?>



    <div style="display: none;">

        <?= $form->field($model, 'mid')->textInput(['value'=>$model->isNewRecord?\Yii::$app->request->get('mid'):$model->mid]) ?>

        <?= $form->field($model, 'wid')->textInput(['value'=>\Yii::$app->user->identity->wid]) ?>

        <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
