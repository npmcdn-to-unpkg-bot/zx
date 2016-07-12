<?php
/**
 * Date: 2016/7/12
 * Time: 16:42
 */
namespace backend\widgets;

use yii\base\Widget;

class InputsWidget extends Widget
{
    public $model;
    public $attribute;
    public $format;
    public $label='数据设置';

    public function init()
    {
        parent::init();
    }

    public function run()
    {

//        $this->format=['label'=>'名称','width'=>'宽度','height'=>'高度'];

        return $this->render('inputs',[
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'format'=>$this->format,
            'label'=>$this->label,
        ]);
    }
}