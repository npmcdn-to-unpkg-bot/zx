<?php
/**
 * Date: 2016/7/16
 * Time: 17:27
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '模板设置: ' . $model->title;

?>

<div class="menu-tmpset">

    <div class="menu-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tmp')->dropDownList($tmpList) ?>

        <div style="display: none;">
            <?= $form->field($model, 'wid')->hiddenInput(['value'=>Yii::$app->user->identity->wid]) ?>

            <?= $form->field($model, 'pid')->hiddenInput()?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('保存', ['class' =>'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>