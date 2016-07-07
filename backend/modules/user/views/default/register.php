<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2015/12/20
 * Time: 20:56
 */
use app\assets\BackendAsset;
use app\assets\BackheadAsset;
use app\assets\ValidateAsset;
BackendAsset::register($this);
BackheadAsset::register($this);
ValidateAsset::register($this);
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
    <div class="registerbox bg-white">
        <div class="registerbox-title">注册</div>

        <div class="registerbox-caption ">请输入你的信息</div>
        <form id="registerForm" action="" method="post" >
        <div class="registerbox-textbox">
            <input type="text" name="username" class="form-control " datatype="s6-12,en6-12" errormsg="用户名至少5个字符,最多16个字符！" sucmsg="成功"  placeholder="用户名" />
        </div>
        <div class="registerbox-textbox">
            <input type="password" name="password" class="form-control" placeholder="密码" />
        </div>
        <div class="registerbox-textbox">
            <input type="password"  class="form-control" placeholder="确认密码" />
        </div>
        <div class="registerbox-textbox">
            <input type="text" name="email" class="form-control" placeholder="邮箱" />
        </div>
            <input name="_csrf"  type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
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
    <div class="logobox" style="line-height: 40px;font-size: 18px;color: #FF0000;text-align: left;padding-left: 10px;">
        <?=Yii::$app->session->getFlash("info")?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
<script>

$(function(){

//    $("#registerForm").Validform({
//        tiptype:function(msg,o,cssctl){
//            var objtip=$(".logobox");
//            cssctl(objtip,o.type);
//            objtip.text(msg);
//        },
//        datatype:{
//            "en6-12":/^[^\a-\z\A-\Z]$/,
//        },
//        callback:function(form){
//            var check=confirm("您确定要提交表单吗？");
//            if(check){
//                form[0].submit();
//            }
//
//            return false;
//        }
//    });
})
</script>
</html>
<?php $this->endPage() ?>

