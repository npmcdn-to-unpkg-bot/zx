<?php
/**
 * Date: 2016/8/2
 * Time: 17:43
 * 微信js
 */

use \frontend\assets\WxAsset;

WxAsset::register($this);

?>
<script>

var shareItems={
    title:  '<?=\Yii::$app->params['wxShareTitle']?>',
    desc:   '<?=\Yii::$app->params['wxShareDesc']?>',
    link:   '<?=\Yii::$app->params['wxShareLink']?\Yii::$app->params['wxShareLink']:\Yii::$app->request->absoluteUrl?>',
    imgUrl: '<?=\Yii::$app->params['wxShareImg']?>'
    ftitle: '<?=\Yii::$app->params['wxShareTitle']?>',
};


wx.config({
    debug: <?=$debug?>, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: "<?=$signPackage['appId']?>", // 必填，公众号的唯一标识
    timestamp: <?=$signPackage['timestamp']?>, // 必填，生成签名的时间戳
    nonceStr: "<?=$signPackage['nonceStr']?>", // 必填，生成签名的随机串
    signature: "<?=$signPackage['signature']?>",// 必填，签名，见附录1
    jsApiList: [<?=$ApiList?>] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});

wx.error(function(res){
    /*
     *config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，
     * 也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
     * */
    alert(res);return;
});



wx.ready(function(){
    /*
    *config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，
    *所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。
    * 对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
    * */
    zxWxShare(shareItems);


});
/*
* 微信分享
* success,cancel 可以传入function(){}
*type,dataUrl 是分享给朋友的时候是music或者video的才需要填
* */
function zxWxShare(shareItems,success,cancel,type,dataUrl)
{
    /*分享到朋友圈*/
    wx.onMenuShareTimeline({
        title: shareItems.title, // 分享标题
        link: shareItems.link, // 分享链接
        imgUrl: shareItems.imgUrl, // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
            success();
            wxShareCount('Timeline');
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
            cancel();
        }
    });

    /*分享给朋友*/
    wx.onMenuShareAppMessage({
        title: shareItems.title, // 分享标题
        desc: shareItems.desc, // 分享描述
        link: shareItems.link, // 分享链接
        imgUrl: shareItems.imgUrl, // 分享图标
        type: type, // 分享类型,music、video或link，不填默认为link
        dataUrl: dataUrl, // 如果type是music或video，则要提供数据链接，默认为空
        success: function () {
            // 用户确认分享后执行的回调函数
            success();
            wxShareCount('AppMessage');
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
            cancel();
        }
    });

    /*分享到QQ*/
    wx.onMenuShareQQ({
        title: shareItems.title, // 分享标题
        desc: shareItems.desc, // 分享描述
        link: shareItems.link, // 分享链接
        imgUrl: shareItems.imgUrl, // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
            success();
            wxShareCount('QQ');
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
            cancel();
        }
    });

    /*分享到腾讯微博*/
    wx.onMenuShareWeibo({
        title: shareItems.title, // 分享标题
        desc: shareItems.desc, // 分享描述
        link: shareItems.link, // 分享链接
        imgUrl: shareItems.imgUrl, // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
            success();
            wxShareCount('Weibo');
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
            cancel();
        }
    });

    /**/
    wx.onMenuShareQZone({
        title: shareItems.title, // 分享标题
        desc: shareItems.desc, // 分享描述
        link: shareItems.link, // 分享链接
        imgUrl: shareItems.imgUrl, // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
            success();
            wxShareCount('QZone');
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
            cancel();
        }
    });

}
/*
* 分享统计
* */
function wxShareCount(type)
{

}

/*
* 显示预览图片,把图片加上一个类名(wx-image)
* */
function wxPreviewImgs(){

    $(document).on("click",".wx-image",function(){
        var wxpreview_current_image;
        var wxpreview_images_list="[";


        wxpreview_current_image=$(this).attr("src");

        $.each($(".wx-image"),function(){
            wxpreview_images_list+=$(this).attr("src")+",";
        });

        wxpreview_images_list+="]";

        wx.previewImage({
            current: wxpreview_current_image, // 当前显示图片的http链接
            urls: wxpreview_images_list // 需要预览的图片http链接列表
        });
    });



}

</script>
