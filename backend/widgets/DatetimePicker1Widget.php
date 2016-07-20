<?php
/**
 * Date: 2016/7/16
 * Time: 15:33
 * 日期时间选择粉色发生
 */
namespace backend\widgets;

use yii\base\Widget;

class DatetimePickerWidget extends Widget
{
    public $model;
    public $attribute;
    public $config=[];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $default=[
            'language'=>'zh-CN',
            'weekStart'=>1,
            'todayBtn'=>1,
            'autoclose'=>1,
            'todayHighlight'=>1,
            'startView'=>2,
            'forceParse'=>0,
            'minuteStep'=>5,
        ];

        $this->config=array_merge($default,$this->config);



        return $this->render('datetimepicker',[
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'config'=>$this->config,
        ]);
    }
}