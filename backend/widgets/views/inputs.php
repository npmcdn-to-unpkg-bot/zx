<?php
/**
 * Date: 2016/7/12
 * Time: 16:42
 */
?>
<div class="form-group">
    <label class="control-label"><?=$label?></label>
    <div  class="form-group">
        <div class="input-group">

                <?foreach($format as $k=>$v){?>
                    <span class="input-group-btn"><a class="btn btn-default"><?=$v?></a></span>
                    <input type="text" name="<?=$k?>[]" class="form-control" placeholder="" >
                <?}?>

                <span class="input-group-btn" style="border-left: none;border-right: none;">
                    <a class="btn btn-default inputs_widget_add_one" >新增</a>
                </span>
        </div>
    </div>

</div>

<script>
$(function(){
    $(".inputs_widget_add_one").on("click",function(){
        var _inputshtml='<div  class="form-group"><div class="input-group">\
        <?foreach($format as $k=>$v){?>
            <span class="input-group-btn"><a class="btn btn-default"><?=$v?></a></span>\
            <input type="text" name="<?=$k?>[]" class="form-control" placeholder="" >\
        <?}?>
        <span class="input-group-btn" style="border-left: none;border-right: none;"><a class="btn btn-default inputs_widget_del_one" >删除</a></span>\
        </div></div></div>';

        $(this).parent().parent().parent().parent().append(_inputshtml);
    });
    $(document).on("click",".inputs_widget_del_one",function(){
        $(this).parent().parent().parent().remove();
    });


})
</script>