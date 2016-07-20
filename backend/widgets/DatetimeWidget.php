<?php
/**
 * Date: 2016/7/16
 * Time: 15:33
 * 日期时间选择
 */
namespace backend\widgets;

use yii\base\Widget;

class DatetimeWidget extends Widget
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



        return $this->render('datetime',[
            'model'=>$this->model,
            'attribute'=>$this->attribute,
            'config'=>$this->config,
        ]);
    }
}