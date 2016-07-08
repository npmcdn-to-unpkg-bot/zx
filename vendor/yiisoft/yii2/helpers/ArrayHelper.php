<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

/**
 * ArrayHelper provides additional array functionality that you can use in your
 * application.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ArrayHelper extends BaseArrayHelper
{

    /*
     * 树结构
     * */
    public static function createTree($array,$parentid=0,$id='id',$pid='pid',$level=1,$plist=array(),$child='children'){
        $n=1;
        $result = array();
        foreach($array as $key => $val){
            if($val[$pid] == $parentid) {
                $tmp = $array[$key];
                $tmp['level']=$level;
                $tmp['plist']=$plist;
                $nplist=array_merge($plist,array($val[$id]));
                unset($array[$key]);
                $tmp[$child] = self::createTree($array,$val[$id],$id,$pid,$level+1,$nplist);
                $result[$key] = $tmp;
            }
        }

        return $result;
    }

    /*
     * 树结构变回一维数组
     * */

    public static function treeTosingle($array,$child='children'){
        static $result_array=array();
        foreach($array as $key=>$value){
            $result_array[]=$value;
            if(is_array($value[$child])){
                self::treeTosingle($value[$child]);
            }
        }
        return $result_array;
    }

    /*
     * 拿通过createTree生成的树结构某ID的plist
     * */

    public static function treeGetplist($array,$id,$child='children'){
        $data=self::treeTosingle($array);
        foreach($data as $item){
            if($item['id']==$id){
                return $item['plist'];
            }
        }
    }


    /*
    Mulitinptwidget
    插件的多input组合的转换为json
    $is_to_json 是否转换为json
    如
    array(
        ['one']=array('1','2',''3);
        ['two']=array('A','B','C');
        ['three']=array('AA','BB','CC');
    )
    变为
    array(
        array('one'=>1,'two'=>'A','three'=>'AA'),
        array('one'=>2,'two'=>'B','three'=>'C'),
        array('one'=>3,'two'=>'BB','three'=>'CC'),
    )
    $data=array('one','two','three');
     */
    public static function mulitinput($data,$is_to_json=1)
    {
        $R=\Yii::$app->request;
        $list=array();
        foreach($data as $k=>$v){
            $list[$v]=$R->post($v);
        }
        $result=array();
        for($i=0;$i<count($list[$data[0]]);$i++){
            $barr=array();
            foreach($data as $kk=>$vv){
                $barr[$vv]=$list[$vv][$i];
            }
            $result[$i]=$barr;
        }
        return $is_to_json?Json::encode($result):$result;
    }




    /*
     * 把一维数组根据指定的个数变为二维数组
     * $level=3;多少个为一组
     * */

    public static function setgroup($data,$level){
        $list=array();$key=0;
        for($i=0;$i<count($data);$i++){
            if($i!=0 && $i%$level==0){
                $key++;
            }
            $list[$key][]=$data[$i];
        }
        return $list;
    }


    /*
     * 对象转数组,使用get_object_vars返回对象属性组成的数组
     * */
    public static function objectToArray($obj){
        $arr = is_object($obj) ? get_object_vars($obj) : $obj;
        if(is_array($arr)){
            return array_map(__METHOD__, $arr);
        }else{
            return $arr;
        }
    }

    /*
     * 数组转对象
     * */
    public static function arrayToObject($arr){
        if(is_array($arr)){
            return (object) array_map(__METHOD__, $arr);
        }else{
            return $arr;
        }
    }

    /*
     * 生成beyondadmin的后台菜单
     * */

    public static function beyondmenu($data,$plist,$mid){
        $html='';

        foreach($data as $k=>$v){
            if(!empty($v['children'])){
                $fa='fa-list-alt';
                $href="javascript:;";
                $title=Url::toRoute([strtolower($v['controller']),'mid'=>$v['id']]);
            }else{
                $fa=' fa-chain';
                $title=$href=Url::toRoute([strtolower($v['controller']),'mid'=>$v['id']]);
            }
            $active=$open='';
            $html.='<li id="beyondmenu'.$v['id'].'"  class="">
                    <a title="'.$title.'" alt="'.$title.'" href="'.$href.'" class="menu-dropdown">
                        <i class="menu-icon fa '.$fa.'"></i>
                                        <span class="menu-text" alt="'.$v['title'].'" title="'.$v['title'].'">
                                            '.StringHelper::truncate($v['title'],6).'
                                        </span>';
            if(!empty($v['children'])){
                $html.='<i class="menu-expand"></i>';
            }
            $html.='</a>';
            if(!empty($v['children'])){
                $html.='<ul class="submenu">';
                $html.=self::beyondmenu($v['children'],$plist,$mid);
                $html.='</ul>';
            }
            $html.='</li>';
        }
        return $html;
    }


}
