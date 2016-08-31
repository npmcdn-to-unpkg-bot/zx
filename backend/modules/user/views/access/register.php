<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2016/3/29
 * Time: 20:48
 */
use backend\assets\BackendAsset;
use backend\assets\BackheadAsset;

BackendAsset::register($this);
BackheadAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>注册页面</title>

    <meta name="description" content="register page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $this->head() ?>
</head>
<!--Head Ends-->
<!--Body-->
<body>
<?php $this->beginBody() ?>
<div class="register-container animated fadeInDown">
    <?php if($AlertMsg=\Yii::$app->session->getFlash('AlertMsg')){
        echo yii\bootstrap\Alert::widget(['body'=>$AlertMsg]);
    }?>
    <div id="waring-box">

    </div>


    <div class="registerbox bg-white">
        <div class="registerbox-title">注册</div>

        <div class="registerbox-caption ">请输入你的信息</div>
        <form id="registerForm" action="" method="post" >
            <div class="registerbox-textbox">
                <input type="text" value="<?php if($reusername=\Yii::$app->session->getFlash('re_username')){echo $reusername;}?>" name="username" class="form-control "   placeholder="用户名(将用作二级域名，不可修改，仅限字母)" />
            </div>
            <div class="registerbox-textbox">
                <input type="password" name="password" class="form-control" placeholder="密码" />
            </div>
            <div class="registerbox-textbox">
                <input type="password" name="confirmpassword"  class="form-control" placeholder="确认密码" />
            </div>
            <div class="registerbox-textbox">
                <input type="text" name="email"  value="<?php if($reemail=\Yii::$app->session->getFlash('re_email')){echo $reemail;}?>" class="form-control" placeholder="邮箱" />
            </div>
            <input name="_backendCSRF"  type="hidden" id="_backendCSRF" value="<?= Yii::$app->request->csrfToken ?>">
            <hr class="wide" />
            <div class="registerbox-textbox no-padding-bottom">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="colored-primary" checked="checked" style="opacity: 0;">
                        <span class="text darkgray">我同意公司的<a class="themeprimary">服务条款和隐私政策</a></span>
                    </label>
                </div>
            </div>
            <div class="registerbox-submit">
                <input type="submit" class="btn btn-primary pull-right" value="提交">
            </div>
        </form>
    </div>
</div>
<script>
    $(function(){

        $("input[name=username]").on("blur",function(){

            var obj=$(this);

            $.ajax({
                url: '<?=\yii\helpers\Url::to(['access/username'])?>?name='+obj.val(),
                type:"get",
                dataType:"json",
                beforeSend:function(){
                },
                complete:function(){
                },
                error:function (XMLHttpRequest, textStatus, errorThrown){
                    alert("网络错误,请重试...");
                },
                success: function(data){

                    if(data.success){
                        $("#waring-box").html('');
                    }else{
                        $("#waring-box").html(getHtml(data.msg));
                        obj.focus();
                    }
                }
            });

        });




    })

    function checkUser(username){

        $.ajax({
            url: '<?=\yii\helpers\Url::to(['access/checkusername'])?>?name='+username,
            type:"get",
            dataType:"json",
            beforeSend:function(){
            },
            complete:function(){
            },
            error:function (XMLHttpRequest, textStatus, errorThrown){
                alert("网络错误,请重试...");
            },
            success: function(data){

                console.log(data);return;

                if(data.success){
                    $("#waring-box").html('');
                }else{
                    $("#waring-box").html(getHtml(data.msg));
                }
            }
        });

    }

    function getHtml(data){

        var html='<div id="w11111" class="alert fade in">\
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
        <span id="waring-msg">'+data+'</span>\
        </div>';

        return html;
    }

</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
