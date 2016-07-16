<?php
/**
 * Date: 2016/7/15
 * Time: 13:39
 */
$data=json_decode($model->$attribute,1);
?>
<div class="form-group">
    <div class="input-group">
      <input type="text" class="form-control file_input_path" value="<?=isset($data['path'])?$data['path']:'未选择任何文件'?>" readonly  name="file_input_show_path" />
      <span class="input-group-btn">
        <div class="btn btn-default" >点击上传</div>
        <input class="beyond_file_input" type="file" name="<?=$attribute?>_file_input" style="display: block;width: 100%;height: 100%;position: absolute;left: 0px;top: 0px;opacity: 0;" />
      </span>
      <span class="input-group-btn" style="border-left: none;border-right: none;">
        <a class="btn btn-default" data-toggle="modal" data-target="#myModal_<?=$attribute?>"   style="border-left: none;border-right: none;">查看图片</a>
      </span>
      <span class="input-group-btn">
        <a class="btn btn-default file_input_delete_one" >删除图片</a>
      </span>
    </div>
    <div class="help-block">(推荐图片宽高<?=$width?>px*<?=$height?>px)</div>
    <div class="modal fade" id="myModal_<?=$attribute?>" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" >图片设置</h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">图片标题</span>
                        <input type="text" name="<?=$attribute?>_file_input_title" value="<?=isset($data['title'])?$data['title']:''?>" class="form-control" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">图片链接</span>
                        <input type="text" name="<?=$attribute?>_file_input_link" value="<?=isset($data['link'])?$data['link']:''?>" class="form-control" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">宽　　度</span>
                        <input type="text" name="<?=$attribute?>_file_input_width" value="<?=isset($data['width'])?$data['width']:$width?>" class="form-control" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">高　　度</span>
                        <input type="text" name="<?=$attribute?>_file_input_height" value="<?=isset($data['height'])?$data['height']:$height?>" class="form-control" placeholder="" >
                    </div>
                    <input type="hidden" name="<?=$attribute?>_file_input_uploadID" value="<?=isset($data['uploadID'])?$data['uploadID']:0?>" />
                    <input type="hidden" name="<?=$attribute?>_file_input_path" value="<?=isset($data['path'])?$data['path']:''?>" />
                    <input type="hidden" name="<?=$attribute?>_file_input_size" value="<?=isset($data['size'])?$data['size']:0?>" />
                    <input type="hidden" class="file_input_delete" name="<?=$attribute?>_file_input_delete" value="0" />
                    <?if(isset($data['path'])){?>
                        <img class="file_input_img_show" src="<?=$data['path']?>" style="margin:auto;margin-top: 10px;max-width:90%;" />
                    <?}?>
                </div>
            </div>
        </div>
    </div>
</div>
