<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/8
 * Time: 14:19
 */

namespace backend\models;


use Yii;


class DatasModel
{
    /*
     * 获取可用的插件列表
     * */
    public static function plugList()
    {
        $plugModel=new \common\models\table\Plug();
        $plugList=$plugModel::find()->where(['is_open'=>1])->asArray()->all();
        $plugArray=array();
        foreach($plugList as $key=>$value){
            $plugArray[$value['id']]=$value['name'];
        }
        return $plugArray;
    }

    /*
     *获取菜单列表的数据，并且有缩进，用于选择菜单的下拉框
     * */
    public static function menuList(){

        $menuList=\common\models\table\Menu::find()->where(['wid'=>Yii::$app->user->identity->wid])
            ->orderBy('sort_order')
            ->select('id,title,pid,sort_order')
            ->asArray()->all();
        $return=array();
        $return[0]='一级菜单';
        $menuList=\yii\helpers\ArrayHelper::createTree($menuList);
        $menuList=\yii\helpers\ArrayHelper::treeTosingle($menuList);
        foreach ($menuList as $item) {
            $left='';
            for($i=1;$i<$item['level'];$i++){
                $left.='　　';
            }
            $return[$item['id']]=$left.'└'.$item['title'];
        }
        return $return;
    }

}