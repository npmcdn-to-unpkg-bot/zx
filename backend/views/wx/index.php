<?php
/**
 * Date: 2016/7/27
 * Time: 15:14
 */
use yii\helpers\Html;
?>

<?= Html::a('新建菜单','javascript:;',['class'=>'btn btn-primary wx-create-menu'])?>

<?= Html::a('删除菜单','javascript:;',['class'=>'btn btn-primary wx-delete-menu'])?>

<script>
$(function(){

    $(".wx-create-menu").on("click",function(){
        $.ajax({
            url: "<?=\yii\helpers\Url::toRoute(['wx/menucreate','wid'=>\Yii::$app->user->identity->wid])?>",
            type:"post",
            data:{
            },
            dataType:"json",
            beforeSend:function(){
                loadingshow();
            },
            complete:function(){
                loadinghide();
            },
            error:function (XMLHttpRequest, textStatus, errorThrown){
                alert("网络错误,请重试...");
            },
            success: function(data){
                console.log(data);
                if(data.errcode==0 && data.errmsg=='ok'){
                    alert('菜单新建成功！');
                }else{
                    alert(data.errmsg);
                }
            }
        });
    })

    $(".wx-delete-menu").on("click",function(){
        $.ajax({
            url: "<?=\yii\helpers\Url::toRoute(['wx/menudelete','wid'=>\Yii::$app->user->identity->wid])?>",
            type:"post",
            data:{
            },
            dataType:"json",
            beforeSend:function(){
                loadingshow();
            },
            complete:function(){
                loadinghide();
            },
            error:function (XMLHttpRequest, textStatus, errorThrown){
                alert("网络错误,请重试...");
            },
            success: function(data){
                console.log(data);
                if(data.errcode==0 && data.errmsg=='ok'){
                    alert('菜单删除成功！');
                }else{
                    alert(data.errmsg);
                }
            }
        });
    })


})
</script>