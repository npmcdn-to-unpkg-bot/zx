<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/11
 * Time: 11:44
 */

use yii\helpers\Html;
use yii\widgets\ActiveField;
use yii\widgets\ActiveForm;

$this->title = '修改密码: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$filed=new ActiveField();
?>
<div class="user-update">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model, 'email')->textInput(['maxlength' => true,'disabled'=>true]) ?>

        <?= $form->field($model,'password')->textInput(['name'=>'old_password','value'=>''])->label('旧密码')?>

        <?= $form->field($model,'password')->passwordInput(['name'=>'new_password','value'=>''])->label('新密码')?>

        <?= $form->field($model,'password')->passwordInput(['name'=>'confirm_password','value'=>'','class'=>'form-control pwdmsg'])->label('确认密码')?>


        <div class="form-group">
            <?= Html::submitButton('确认修改', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<script>
$(function(){
    $("input[name=old_password]").on("blur",function(){
        if($(this).val().length<6){
            $(this).parent().find(".help-block").html('密码长度必须大于等于6位');

        }else{
            $(this).parent().find(".help-block").html('');

        }
    });
    $("input[name=new_password]").on("blur",function(){
        if($(this).val().length<6){
            $(this).parent().find(".help-block").html('密码长度必须大于等于6位');

        }else{
            $(this).parent().find(".help-block").html('');

        }
    });

    $(".btn-primary").on("click",function(e){
        e.preventDefault();
        var npwd=$("input[name=new_password]").val();
        var cpwd=$("input[name=confirm_password]").val();
        if(npwd!=cpwd){
            $(".pwdmsg").parent().find(".help-block").html('两次输入的密码不一致！');
            return;
        }
        $("#w0").submit();
    });
})
</script>
</div>