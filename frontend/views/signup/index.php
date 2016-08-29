<?php
/**
 * Date: 2016/8/24
 * Time: 16:35
 */

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\WxuiAsset;

$this->title=$data->title;
//$this->registerCssFile('/assets/css/common.css');
//$this->registerJsFile('/assets/js/common.js',['position'=>\yii\web\View::POS_HEAD,'depends'=>'frontend\assets\AppAsset']);

WxuiAsset::register($this);

?>
<div class="container" id="container">

    <div class="weui_cells_title">报名信息</div>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">姓　名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="text" placeholder="请输入姓名" name="tel" />
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="number" pattern="[0-9]*" placeholder="请输入手机号" name="tel" />
            </div>
        </div>
        <div class="weui_cell weui_vcode weui_cell_warn">
            <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="number" placeholder="请输入验证码"/>
            </div>
            <div class="weui_cell_ft">
                <i class="weui_icon_warn"></i>
                <img src="./images/vcode.jpg" />
            </div>
        </div>
    </div>
    <div class="weui_cells_tips">
<!--        底部说明文字底部说明文字-->
    </div>
    <div class="weui_btn_area">
        <a class="weui_btn weui_btn_primary" href="javascript:">确定</a>
    </div>
</div>
<script>
$(function(){

    $(".submit").on("click",function(){

        $.ajax({
            url: location.href,
            type:"post",
            data:{
                "_csrf":CSRFTOKEN,
                "name": $("input[name=name]").val(),
                "tel" : $("input[name=tel]").val()
            },
            dataType:"json",
            beforeSend:function(){
                ajaxing=true;
                $("#mloading").show();
            },
            complete:function(){
                $("#mloading").hide();
                ajaxing=false;
            },
            error:function (XMLHttpRequest, textStatus, errorThrown){
                alert("网络错误,请重试...");
            },
            success: function(data){
                console.log(data);
            }
        });

    });
})
</script>