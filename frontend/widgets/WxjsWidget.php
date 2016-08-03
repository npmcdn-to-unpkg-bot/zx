<?php
/**
 * Date: 2016/8/2
 * Time: 17:41
 */
namespace frontend\widgets;

use yii\base\Widget;

class WxjsWidget extends Widget
{
    public $model;
    public $attribute;//以上两个参数是为了在activefield中可以使用widget方法加的，不要删除

    public $debug=false;

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $ApiList=[
            'onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo',
            'onMenuShareQZone', 'startRecord', 'stopRecord', 'onVoiceRecordEnd',
            'playVoice', 'pauseVoice', 'stopVoice', 'onVoicePlayEnd', 'uploadVoice',
            'downloadVoice', 'chooseImage', 'previewImage', 'uploadImage', 'downloadImage',
            'translateVoice', 'getNetworkType',
            'openLocation', 'getLocation',
            'hideOptionMenu', 'showOptionMenu', 'hideMenuItems', 'showMenuItems',
            'hideAllNonBaseMenuItem', 'showAllNonBaseMenuItem',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard', 'chooseCard', 'openCard'
        ];

        $ApiListStr='';

        foreach($ApiList as $key=>$value){
            $ApiListStr.="\n'".$value."',";
        }

        $signPackage=\common\weixin\JssdkHelper::getSignPackage(\Yii::$app->params['wid']);

        return $this->render('wxjs',[
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'debug' => $this->debug,
            'signPackage'=>$signPackage,
            'ApiList'=>$ApiListStr
        ]);
    }
}