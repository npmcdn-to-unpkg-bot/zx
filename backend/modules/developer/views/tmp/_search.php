<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TmpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tmpid') ?>

    <?= $form->field($model, 'is_use') ?>

    <?= $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'configs') ?>

    <?php // echo $form->field($model, 'plugid') ?>

    <?php // echo $form->field($model, 'short') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'imageset') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
