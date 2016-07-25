<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>

<!--    --><?//= $form->field($model, 'mid') ?>
<!---->
<!--    --><?//= $form->field($model, 'wid') ?>

    <?= $form->field($model, 'title')->textInput(['style'=>'width:50%']) ?>

<!--    --><?//= $form->field($model, 'mtitle') ?>

    <?php // echo $form->field($model, 'img_list') ?>

    <?php // echo $form->field($model, 'img_title') ?>

    <?php // echo $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'pubtime') ?>

    <?php // echo $form->field($model, 'from') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'isopen') ?>

    <?php // echo $form->field($model, 'isrecommend') ?>

    <?php // echo $form->field($model, 'catid') ?>

    <?php // echo $form->field($model, 'sort_order') ?>

    <?php // echo $form->field($model, 'seo') ?>

    <?php // echo $form->field($model, 'share') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
