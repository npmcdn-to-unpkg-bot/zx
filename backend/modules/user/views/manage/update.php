<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '更新账号: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">


    <div class="user-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



        <?= $form->field($model, 'email')->textInput(['maxlength' => true,'disabled'=>true]) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true,'disabled'=>true]) ?>

        <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

        <?php if(\Yii::$app->user->identity->pid<1 ){?>

            <?= $form->field($model, 'is_active')->radioList(['1'=>'启用','0'=>'停用'])->label('使用状态') ?>

            <?php //= $form->field($model,'password')->passwordInput(['name'=>'changepwd','value'=>''])?>

        <?php }?>



        <?= $form->field($model, 'portrait')->widget(backend\widgets\FileInputWidget::className(),['width'=>100,'height'=>100]) ?>

        <?= $form->field($model, 'last_login_time')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDatetime($model->last_login_time)]) ?>

        <?= $form->field($model, 'last_login_ip')->textInput(['maxlength' => true,'disabled'=>true]) ?>

        <?= $form->field($model, 'login_times')->textInput(['disabled'=>true]) ?>

        <?= $form->field($model, 'role')->textInput(['maxlength' => true,'disabled'=>true]) ?>

        <?= $form->field($model, 'created_at')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDatetime($model->created_at)]) ?>

        <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDatetime($model->updated_at)]) ?>



        <?= $form->field($model, 'expire')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDate($model->expire)])?>

        <div class="form-group">
            <?= Html::submitButton('更新资料', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
