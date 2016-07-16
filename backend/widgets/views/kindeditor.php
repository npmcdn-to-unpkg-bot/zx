<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/25
 * Time: 15:58
 */

backend\assets\KindeditorAsset::register($this);
?>


<?=yii\helpers\Html::activeTextarea($model, $attribute,['id'=>$attribute.'_kindeditor'])?>

<script>
$(function(){
    KindEditor.ready(function(K) {
        K.create('#<?=$attribute?>_kindeditor', {
            uploadJson : '<?=\yii\helpers\Url::toRoute(['/base/keupload/index'])?>',
            themeType : 'simple',
            width:'100%',
            height:'250px',
            resizeType:1,
            allowFlashUpload:false,
            allowMediaUpload:false,
            allowFileUpload:false,
            fontSizeTable:[
                '9px', '10px', '12px', '14px', '16px', '18px', '24px','25','28px','30px','32px',
                '35px','36px','38px','40px','45px'
            ],
            items:[
                'source', '|', 'undo', 'redo', '|', 'preview','code', 'cut', 'copy', 'paste',
                'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                'anchor', 'link', 'unlink'
            ]
        });
    });
})
</script>