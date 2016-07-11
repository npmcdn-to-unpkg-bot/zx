<?php
/**
 * Date: 2016/7/11
 * Time: 17:05
 */

?>
<style>
    .dropdown-menu .jqupload-input{
        text-align: center;
    }
    .jqupload-info-menu{
        width:100%;
    }

    .jqupload-click{position: relative;}
    .jqupload-input{width:100%;height: 100%;position: absolute;left: 0px;top: 0px;z-index:2;cursor: pointer;opacity: 0;}
    .jqupload-box{z-index: 1;}
</style>
<div class="form-group field-menu-title required">
    <label class="control-label" for="menu-title">标题</label><br/>
    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-default">1</button>
        <button type="button" class="btn btn-default">2</button>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                图片设置
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu jqupload-info-menu">
                <li><input type="text" class="jqupload-input" placeholder="px"></li>
                <li><input type="text" class="jqupload-input" placeholder="px"></li>
            </ul>
        </div>
    </div>

    <div class="help-block"></div>
</div>



<div class="form-group field-user-user_portrait">
    <label class="control-label" id="jq-label-show" for="user-user_portrait">12312</label>
    <div class="input-group">
      <input type="text" class="form-control jqupload-links" value="" readonly id="jqupload_url" name="" placeholder="显示图片上传后的路径" />
      <span class="input-group-btn jqupload-click">
        <div class="btn btn-default jqupload-box" >点击上传</div>
        <input id="qweqw" class="jqupload-input" type="file" name="jqupload" />
      </span>
      <span class="input-group-btn" style="border-left: none;border-right: none;">
        <a class="btn btn-default jqupload-preview"  data-toggle="popover" data-placement="left" data-content="<img src='/upload/jiang.png'/>" style="border-left: none;border-right: none;">图片预览</a>
      </span>
      <span class="input-group-btn">
        <a class="btn btn-default jqupload-delete" id="jqupload-delete-path" data-key="" data-path="" >删除图片</a>
      </span>
    </div>
    <div class="help-block"></div>
</div>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>

