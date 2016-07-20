<?php
/**
 * Date: 2016/7/15
 * Time: 13:39
 */

namespace backend\widgets;

use yii\base\Widget;

class FileInputWidget extends Widget
{
    public $model;
    public $attribute;
    public $width=0;
    public $height=0;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        /*XIUGAIYIXIAKANKAN */
        return $this->render('fileinput',[
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'width'=>$this->width,
            'height'=>$this->height,
        ]);
    }
}