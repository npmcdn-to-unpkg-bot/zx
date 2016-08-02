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



    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $signPackage=\common\weixin\JssdkHelper::getSignPackage($wid);


        return $this->render('wxjs',[
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'signPackage'=>$signPackage,
        ]);
    }
}