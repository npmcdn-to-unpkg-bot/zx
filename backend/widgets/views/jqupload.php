<?php
/**
 * Date: 2016/7/11
 * Time: 17:05
 */

?>
<style>
    .dropdown-menu .jqupload-input{text-align: center;}
    .jqupload-info-menu{width:100%;}
    .jqupload-click{position: relative;}
    .jqupload-input{width:100%;height: 100%;position: absolute;left: 0px;top: 0px;z-index:2;cursor: pointer;opacity: 0;}
    .jqupload-box{z-index: 1;}
    .modal-body .jqupload-info-input{margin-top: 5px;}
</style>




<div class="form-group">
    <label class="control-label" id="jq-label-show" for="user-user_portrait">图片</label>
    <div class="input-group">
      <input type="text" class="form-control jqupload-links" value="" readonly  name="" placeholder="显示图片上传后的路径" />
      <span class="input-group-btn jqupload-click">
        <div class="btn btn-default jqupload-box" >点击上传</div>
        <input id="qweqw" class="jqupload-input" type="file" name="jqupload" />
      </span>
      <span class="input-group-btn" style="border-left: none;border-right: none;">
        <a class="btn btn-default jqupload-preview" data-toggle="modal" data-target="#myModal"   style="border-left: none;border-right: none;">图片设置</a>
      </span>
      <span class="input-group-btn">
        <a class="btn btn-default jqupload-delete" >删除图片</a>
      </span>
    </div>
    <div class="help-block"></div>

    <img src="/upload/guize.png" style="margin:auto;max-width:80%;max-height:300px;" />

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" >图片设置</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">图片标题</span>
                        <input type="text" name="jqupload-title[]" class="form-control" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">图片链接</span>
                        <input type="text" name="jqupload-link[]" class="form-control" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">宽　　度</span>
                        <input type="text" name="jqupload-width[]" class="form-control" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">高　　度</span>
                        <input type="text" name="jqupload-height" class="form-control" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">大　　小</span>
                        <input type="text" name="jqupload-size" class="form-control" placeholder="" >
                    </div>
                    <input type="hidden" name="jqupload-id" />
                </div>
            </div>
        </div>
    </div>
</div>


