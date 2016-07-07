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

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?//= $form->field($model, 'wid')->textInput() ?>

        <?//= $form->field($model, 'pid')->textInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true,'disabled'=>true]) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?//= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?if(\Yii::$app->user->identity->pid<1 ){?>

            <?= $form->field($model, 'is_active')->radioList(['1'=>'启用','0'=>'停用'])->label('使用状态') ?>

            <?= Html::uinput('重新设置密码','changepwd') ?>

        <?}?>

        <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'portrait')->widget(backend\widgets\JquploadWidget::className(),['data'=>$model->portrait]) ?>

        <?= $form->field($model, 'last_login_time')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDatetime($model->last_login_time)]) ?>

        <?= $form->field($model, 'last_login_ip')->textInput(['maxlength' => true,'disabled'=>true]) ?>

        <?= $form->field($model, 'login_times')->textInput(['disabled'=>true]) ?>

        <?= $form->field($model, 'role')->textInput(['maxlength' => true,'disabled'=>true]) ?>

        <?= $form->field($model, 'created_at')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDatetime($model->created_at)]) ?>

        <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDatetime($model->updated_at)]) ?>

        <?//= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

        <?//= $form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'expire')->textInput(['maxlength' => true,'disabled'=>true,'value'=>\Yii::$app->formatter->asDate($model->expire)])?>

        <div class="form-group">
            <?= Html::submitButton('更新资料', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
