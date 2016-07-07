<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/11
 * Time: 11:44
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

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

        <?= Html::uinput('旧密码','old_password')?>

        <?= Html::uinput('新密码','new_password','',['type'=>'password','class'=>'form-control'])?>

        <?= Html::uinput('确认密码','confirm_password','',['type'=>'password','class'=>'form-control pwdmsg'])?>

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
            return;
        }else{
            $(this).parent().find(".help-block").html('');
            return;
        }
    });
    $("input[name=new_password]").on("blur",function(){
        if($(this).val().length<6){
            $(this).parent().find(".help-block").html('密码长度必须大于等于6位');
            return;
        }else{
            $(this).parent().find(".help-block").html('');
            return;
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