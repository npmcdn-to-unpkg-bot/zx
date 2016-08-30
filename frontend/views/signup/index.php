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
                <input class="weui_input" type="text" placeholder="请输入姓名" name="name" />
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
                <i style="display: none;" class="weui_icon_warn"></i>
                <img style="width:130px;" id="verifycode" src="<?=Url::to(['base/genverifycode'])?>" data-route="<?=Url::to(['base/genverifycode'])?>" />
            </div>
        </div>
    </div>
    <div class="weui_cells_tips">
<!--        底部说明文字底部说明文字-->
    </div>
    <div class="weui_btn_area">
        <a id="submit" class="weui_btn weui_btn_primary" href="javascript:">确定</a>
    </div>
</div>
<!--BEGIN toast-->
<div id="toast" style="display: none;">
    <div class="weui_mask_transparent"></div>
    <div class="weui_toast">
        <i class="weui_icon_toast"></i>
        <p class="weui_toast_content">已完成</p>
    </div>
</div>
<!--end toast-->

<!-- loading toast -->
<div id="loadingToast" class="weui_loading_toast" style="display:none;">
    <div class="weui_mask_transparent"></div>
    <div class="weui_toast">
        <div class="weui_loading">
            <div class="weui_loading_leaf weui_loading_leaf_0"></div>
            <div class="weui_loading_leaf weui_loading_leaf_1"></div>
            <div class="weui_loading_leaf weui_loading_leaf_2"></div>
            <div class="weui_loading_leaf weui_loading_leaf_3"></div>
            <div class="weui_loading_leaf weui_loading_leaf_4"></div>
            <div class="weui_loading_leaf weui_loading_leaf_5"></div>
            <div class="weui_loading_leaf weui_loading_leaf_6"></div>
            <div class="weui_loading_leaf weui_loading_leaf_7"></div>
            <div class="weui_loading_leaf weui_loading_leaf_8"></div>
            <div class="weui_loading_leaf weui_loading_leaf_9"></div>
            <div class="weui_loading_leaf weui_loading_leaf_10"></div>
            <div class="weui_loading_leaf weui_loading_leaf_11"></div>
        </div>
        <p class="weui_toast_content">数据加载中</p>
    </div>
</div>
<script>
$(function(){

    $("#verifycode").on("click",function(){
        $(this).attr('src',$(this).attr('data-route')+"?v="+Math.random());
    });

    $("#submit").on("click",function(){

        var name=$("input[name=name]").val();
        var tel=$("input[name=tel]").val();

        if(_lm.valide.isEmpty(name)){
            return alert('请填写姓名！');
        }
        if(!_lm.valide.tel(tel)){
            return alert('请填写正确的手机格式！');
        }

        $.ajax({
            url: location.href,
            type:"post",
            data:{
                "name": name,
                "tel" : tel,
            },
            dataType:"json",
            beforeSend:function(){
                ajaxing=true;
                $("#loadingToast").show();
            },
            complete:function(){
                $("#loadingToast").hide();
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