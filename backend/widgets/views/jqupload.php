<?php
/**
 * Date: 2016/7/11
 * Time: 17:05
 */

use backend\assets\JquploadAsset;

JquploadAsset::register($this);

$data=json_decode($model->$attribute,1);

?>

<div class="form-group" data-url="<?=\yii\helpers\Url::toRoute(['/base/jqupload/uploadimg'])?>">
<!--    <label class="control-label">--><?//=$label?><!--</label>-->
    <div class="input-group">
      <input type="text" class="form-control jqupload-img-path" value="<?=$data['path']?>" readonly  name="" placeholder="显示图片上传后的路径" />
      <span class="input-group-btn jqupload-click">
        <div class="btn btn-default jqupload-box" >点击上传</div>
        <input id="jqupload_<?=$attribute?>" class="jqupload-input-img" type="file" name="jqupload" />
      </span>
      <span class="input-group-btn" style="border-left: none;border-right: none;">
        <a class="btn btn-default" data-toggle="modal" data-target="#myModal_<?=$attribute?>"   style="border-left: none;border-right: none;">图片设置</a>
      </span>
      <span class="input-group-btn">
        <a class="btn btn-default jqupload-delete" >删除图片</a>
      </span>
    </div>
    <div class="help-block"></div>
    <img class="jqupload_img" src="<?=$data['path']?>" style="margin:auto;max-width:80%;max-height:300px;" />
    <div class="modal fade" id="myModal_<?=$attribute?>" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" >图片设置</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">图片标题</span>
                        <input type="text" name="jqupload-title[]" value="<?=$data['title']?>" class="form-control jqupload_img_title" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">图片链接</span>
                        <input type="text" name="jqupload-link[]" value="<?=$data['link']?>" class="form-control jqupload_img_link" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">宽　　度</span>
                        <input type="text" name="jqupload-width[]" value="<?=$data['width']?>" class="form-control  jqupload_img_width" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">高　　度</span>
                        <input type="text" name="jqupload-height[]" value="<?=$data['height']?>" class="form-control  jqupload_img_height" placeholder="" >
                    </div>
                    <div class="input-group jqupload-info-input">
                        <span class="input-group-addon">大　　小</span>
                        <input type="text" name="jqupload-size[]" value="<?=$data['size']?>" readonly class="form-control  jqupload_img_size" placeholder="" >
                    </div>
                    <?=\yii\helpers\Html::activeHiddenInput($model,$attribute,['class'=>'jqupload_img_info','value'=>''])?>
                    <input type="hidden" name="jqupload-images_id" class="jqupload_img_images_id" />
                    <input type="hidden" name="mid[]" class="jqupload-img-mid" value="<?=$mid?>" />
                    <input type="hidden" name="cid[]" class="jqupload-img-cid" value="<?=$cid?>" />
                </div>
            </div>
        </div>
    </div>
</div>
