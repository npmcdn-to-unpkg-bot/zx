<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\MenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'wid') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'mtitle') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'tmp') ?>

    <?php // echo $form->field($model, 'tmp_config') ?>

    <?php // echo $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'plist') ?>

    <?php // echo $form->field($model, 'ext_data') ?>

    <?php // echo $form->field($model, 'configs') ?>

    <?php // echo $form->field($model, 'sort_order') ?>

    <?php // echo $form->field($model, 'is_open') ?>

    <?php // echo $form->field($model, 'configdata') ?>

    <?php // echo $form->field($model, 'configimg') ?>

    <?php // echo $form->field($model, 'share') ?>

    <?php // echo $form->field($model, 'seo') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
