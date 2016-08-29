<?php
/**
 * Date: 2016/8/24
 * Time: 16:35
 */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title=$data->title;

//$this->registerCssFile('/assets/css/common.css');
$this->registerJsFile(SOURCEPATH.'/1.js');
//$this->registerJsFile('/assets/js/common.js',['position'=>\yii\web\View::POS_HEAD,'depends'=>'frontend\assets\AppAsset']);

\Yii::$app->request->gethostInfo();

?>

<?php if(isset(\Yii::$app->params['showtips'])){echo \Yii::$app->params['tips'];}?>

<input type="text" name="name" value="<?=$info->name?>" />

<input type="text" name="tel" value="<?=$info->tel?>" />


<a href="javascript:;" class="submit">提交</a>


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