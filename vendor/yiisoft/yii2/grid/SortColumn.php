<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2016/3/12
 * Time: 13:46
 */

namespace yii\grid;

use Closure;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

/**
 *排序功能
 */
class SortColumn extends Column
{
    /**
     */
    public $name = 'sortorder';
    public $inputOptions = [];
    public $multiple = true;


    public function init()
    {
        parent::init();
        if (empty($this->name)) {
            throw new InvalidConfigException('The "name" property must be set.');
        }
        if (substr_compare($this->name, '[]', -2, 2)) {
            $this->name .= '[]';
        }

    }

    protected function renderHeaderCellContent()
    {
        return Html::a('保存排序','javascript:;', ['class' => 'btn','id'=>'saveorders','style'=>'background:#dedede;']);
    }

    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->inputOptions instanceof Closure) {
            $options = call_user_func($this->inputOptions, $model, $key, $index, $this);
        } else {
            $options = $this->inputOptions;
            if (!isset($options['data-id'])) {
                $options['data-id'] = is_array($key) ? json_encode($key, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : $key;
            }
        }
        $options['style']="width:70px;text-align:center;";
        if(is_array($model)){//数组提供器的时候，主要是菜单列表那里
            $single=$model['sort_order'];
            $options['data-id']=$model['id'];
        }else{
            $single=$model->sort_order;
            $options['data-id']=$model->id;
        }
        $options['class']="save_sort_order";
        return Html::input('number',$this->name,$single,$options);

    }
}

