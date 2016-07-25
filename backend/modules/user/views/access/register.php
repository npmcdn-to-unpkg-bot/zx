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
    <div class="registerbox bg-white">
        <div class="registerbox-title">注册</div>

        <div class="registerbox-caption ">请输入你的信息</div>
        <form id="registerForm" action="" method="post" >
            <div class="registerbox-textbox">
                <input type="text" value="<?if($reusername=\Yii::$app->session->getFlash('re_username')){echo $reusername;}?>" name="username" class="form-control " datatype="s6-12,en6-12" errormsg="用户名至少5个字符,最多16个字符！" sucmsg="成功"  placeholder="用户名" />
            </div>
            <div class="registerbox-textbox">
                <input type="password" name="password" class="form-control" placeholder="密码" />
            </div>
            <div class="registerbox-textbox">
                <input type="password" name="confirmpassword"  class="form-control" placeholder="确认密码" />
            </div>
            <div class="registerbox-textbox">
                <input type="text" name="email"  value="<?if($reemail=\Yii::$app->session->getFlash('re_email')){echo $reemail;}?>" class="form-control" placeholder="邮箱" />
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
    <div class="logobox" style="display:none;line-height: 40px;font-size: 18px;color: #FF0000;text-align: left;padding-left: 10px;">
        <?//=Yii::$app->session->getFlash("info")?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
