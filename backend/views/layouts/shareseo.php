<?php
/**
 * Date: 2016/7/18
 * Time: 11:16
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '更多设置: ' . $model->title;

$share=json_decode($model->share,1);
$seo=json_decode($model->seo,1);


?>

<div class="menu-tmpset">

    <div class="menu-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'share')->textInput(['name'=>'share_title','value'=>isset($share['title'])?$share['title']:''])->label('分享标题')?>

        <?= $form->field($model, 'share')->textarea(['name'=>'share_desc','rows'=>6,'value'=>isset($share['desc'])?$share['desc']:''])->label('分享描述')?>

        <div class="form-group">
            <label>分享图片</label>
            <div class="input-group">
                <input type="text" class="form-control file_input_path" value="<?=isset($share['img'])?$share['img']:'未选择任何文件'?>" readonly  name="file_input_show_path" />
                  <span class="input-group-btn">
                    <div class="btn btn-default" >点击上传</div>
                    <input class="beyond_file_input" type="file" name="share_file_input" style="display: block;width: 100%;height: 100%;position: absolute;left: 0px;top: 0px;opacity: 0;" />
                  </span>
                  <span class="input-group-btn">
                    <a class="btn btn-default file_input_delete_one" >删除图片</a>
                  </span>
            </div>
            <div class="help-block">(推荐图片宽高360px*360px)</div>
            <input type="hidden" name="share_file_input_path" value="<?=isset($share['img'])?$share['img']:''?>" />
            <input type="hidden" name="share_file_input_width" value="360" />
            <input type="hidden" name="share_file_input_height" value="360" />
        </div>
        <?if(isset($share['img'])){?>
            <img src="<?=$share['img']?>" />
        <?}?>

        <?= $form->field($model, 'seo')->textInput(['name'=>'seo_title','value'=>isset($seo['title'])?$seo['title']:''])->label('SEO标题')?>

        <?= $form->field($model, 'seo')->textarea(['name'=>'seo_desc','rows'=>6,'value'=>isset($seo['desc'])?$seo['desc']:''])->label('SEO描述')?>


        <div style="display: none;">
            <?= $form->field($model, 'wid')->hiddenInput(['value'=>Yii::$app->user->identity->wid]) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('保存', ['class' =>'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>