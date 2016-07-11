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

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('jqupload',[
            'model'=>$this->model,
            'attribute'=>$this->attribute,
        ]);
    }
}