<?php
/**
 * Date: 2016/7/11
 * Time: 14:31
 */
namespace backend\widgets;

use yii\base\Widget;

class JquploadWidget extends Widget
{
    public $model;
    public $attribute;//以上两个参数是为了在activefield中可以使用widget方法加的，不要删除
    public $label='图片上传';
    public $check=false;//是否需要检查
    public $mid=0;
    public $cid=0;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('jqupload',[
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'check'=>$this->check,
            'label'=>$this->label,
            'mid'=>$this->mid?$this->mid:\Yii::$app->request->get('mid'),
            'cid'=>$this->cid?$this->cid:\Yii::$app->request->get('cid'),
        ]);
    }
}