<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2016/3/29
 * Time: 20:22
 */
use yii\helpers\Url;
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
        <title>登录页面</title>
        <meta name="description" content="login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="login-container animated fadeInDown">
        <?if($AlertMsg=\Yii::$app->session->getFlash('AlertMsg')){
            echo yii\bootstrap\Alert::widget(['body'=>$AlertMsg]);
        }?>
        <div class="loginbox bg-white">
            <form action="" method="post">
                <div class="loginbox-title">登录</div>
                <div class="loginbox-social">
                    <div class="social-title ">Connect with Your Social Accounts</div>
                    <div class="social-buttons">
                        <a href="javascript:;" class="button-facebook">
                            <i class="social-icon fa fa-facebook"></i>
                        </a>
                        <a href="javascript:;" class="button-twitter">
                            <i class="social-icon fa fa-twitter"></i>
                        </a>
                        <a href="javascript:;" class="button-google">
                            <i class="social-icon fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="loginbox-or">
                    <div class="or-line"></div>
                    <div class="or">OR</div>
                </div>
                <div class="loginbox-textbox">
                    <input type="text" name="email" class="form-control" placeholder="邮箱" />
                </div>
                <div class="loginbox-textbox">
                    <input type="password" name="password" class="form-control" placeholder="密码" />
                </div>
                <div class="loginbox-forgot">
                    <a href="<?=Url::toRoute(['user/forget'])?>">忘记密码?</a>
                </div>
                <input name="_backendCSRF"  type="hidden" id="_backendCSRF" value="<?= Yii::$app->request->csrfToken ?>">
                <div class="loginbox-submit">
                    <input type="submit" class="btn btn-primary btn-block" value="登录">
                </div>
                <div class="loginbox-signup">
                    <a href="<?=Url::toRoute(['access/register'])?>">邮箱注册</a>
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