<?php
/**
 * Date: 2016/8/25
 * Time: 11:15
 */
namespace frontend\widgets;

use yii\base\Widget;

class LoadingWidget extends Widget
{

    public $rgba='rgba(255, 255, 255, 0.7)';

    public $color='#27aef5';

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        return $this->render('loading',[
            'rgba'=>$this->rgba,
            'color'=>$this->color,
        ]);
    }
}