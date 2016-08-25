<?php
/**
 * Date: 2016/8/25
 * Time: 11:08
 */
namespace yii\helpers;
use yii\base\NotSupportedException;

class ValidateHelper
{
    //去除字符串空格
    static function strTrim($str)
    {
        return preg_replace("/\s/","",$str);
    }
    //验证用户名*
    static function username($min,$max,$str,$type)
    {
        $denied=array('test','admin','root','manage','kefu');
        $str=self::strTrim($str);
        foreach($denied as $v)
        {
            if(preg_match("/{$v}/i",$str))return false;
        }
        if($max<=strlen($str)||$min>=strlen($str)){
            return false;
        } else{
            switch($type)
            {
                case "EN"://纯英文
                    return preg_match("/^[a-zA-Z]+$/",$str);
                    break;
                case "ENNUM"://英文数字//必须以 字母开始
                    return preg_match("/^[a-zA-Z]+[a-zA-Z0-9]+$/",$str);
                    break;
                case "ALL":    //允许的符号(|-_字母数字)
                    return preg_match("/^[\|\-\_a-zA-Z0-9]+$/",$str);
                    break;
            }
        }
    }


    static function chekpwd($str)
    {

        if(preg_match("/^[a-zA-Z]+$/",$str) || preg_match("/^[0-9]+$/",$str))
        {
            return true;
        }

        return false;

    }


    //验证密码长度*
    static function password($min,$max,$str)
    {
        $str=self::strTrim($str);
        if(strlen($str)>=$min || strlen($str)<=$max){
            return true;
        }else{
            return false;
        }
    }
    //验证Email*
    static function is_email($str)
    {
        $str=self::strTrim($str);
        return preg_match("/^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.){1,2}[a-z]{2,4}$/i",$str);
    }

    static function sqlStr($str){
        return !preg_match('/(select)|(update)|(insert)|(create)|(delete)/',$str);
    }

    //验证utf8中文
    static function chineseUtf8($min,$max,$str){
        $str=self::strTrim($str);
        $len=mb_strlen($str,'utf-8');
        if($len>$max || $len<$min)
            return false;
        return preg_match("/^[\x7f-\xff]+$/",$str);
    }

    //验证utf8中文和字母的组合
    static function syname($min,$max,$str){
        $str=self::strTrim($str);
        $len=mb_strlen($str,'utf-8');
        if($len>$max || $len<$min)
            return false;
        return preg_match("/^[\x7f-\xffA-Za-z]+$/",$str);
    }

    //验证身份证(中国)
    static function idCard($str)
    {
        $str=self::strTrim($str);
        if(preg_match("/^([0-9]{15}|[0-9]{17}[0-9a-z])$/i",$str))
        {
            return true;
        }else{
            return false;
        }
    }

    static function mobilePhone($str){
        $str=self::strTrim($str);
        if(!preg_match('/^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|17[0-9]{9}$|18[0-9]{9}$/',$str)){
            return false;
        }
        return true;
    }
    //验证座机电话
    static function Phone($str,$type)
    {
        $str=self::strTrim($str);
        switch($type)
        {
            case "CHN":
                if(preg_match("/(^([0-9]{3}|0[0-9]{3})-[0-9]{7,8}$)|(^[0-9]{7,8}$)/",$str))
                {
                    return true;
                }else{
                    return false;
                }
                break;
            case "INT":
                if(preg_match("/^[0-9]{4}-([0-9]{3}|0[0-9]{3})-[0-9]{7,8}$/",$str))
                {
                    return true;
                }else{
                    return false;
                }
                break;
        }
    }
    //验证中国邮编
    static function postCode($str){
        return preg_match('/^[0-9]{6}$/',$str);
    }


    //验证是否是数字
    static function checkIsnum($str){
        return preg_match('/^\d+(\.\d+)?$/',$str);
    }


    // $num为身份证号码，$checkSex：1为男，2为女，不输入为不验证
    static public function checkIdentity($num,$checkSex=''){
        // 不是15位或不是18位都是无效身份证号
        if(strlen($num) != 15 && strlen($num) != 18){
            return false;
        }
        // 是数值
        if(is_numeric($num)){
            // 如果是15位身份证号
            if(strlen($num) == 15 ){
                // 省市县（6位）
                $areaNum = substr($num,0,6);
                // 出生年月（6位）
                $dateNum = substr($num,6,6);
                // 性别（3位）
                $sexNum = substr($num,12,3);
            }else{
                // 如果是18位身份证号
                // 省市县（6位）
                $areaNum = substr($num,0,6);
                // 出生年月（8位）
                $dateNum = substr($num,6,8);
                // 性别（3位）
                $sexNum = substr($num,14,3);
                // 校验码（1位）
                $endNum = substr($num,17,1);
            }
        }else{
            // 不是数值
            if(strlen($num) == 15){
                return false;
            }else{
                // 验证前17位为数值，且18位为字符x
                $check17 = substr($num,0,17);
                if(!is_numeric($check17)){
                    return false;
                }
                // 省市县（6位）
                $areaNum = substr($num,0,6);
                // 出生年月（8位）
                $dateNum = substr($num,6,8);
                // 性别（3位）
                $sexNum = substr($num,14,3);
                // 校验码（1位）
                $endNum = substr($num,17,1);
                if($endNum != 'x' && $endNum != 'X'){
                    return false;
                }
            }
        }

        if(isset($areaNum)){
            if(!self::checkArea($areaNum)){
                return false;
            }
        }

        if(isset($dateNum)){
            if(!self::checkDate($dateNum)){
                return false;
            }
        }

        // 性别1为男，2为女
        if($checkSex == 1){
            if(isset($sexNum)){
                if(!self::checkSex($sexNum)){
                    return false;
                }
            }
        }else if($checkSex == 2){
            if(isset($sexNum)){
                if(self::checkSex($sexNum)){
                    return false;
                }
            }
        }

        if(isset($endNum)){
            if(!self::checkEnd($endNum,$num)){
                return false;
            }
        }
        return true;
    }

    // 验证城市
    static  private function checkArea($area){
        $num1 = substr($area,0,2);
        $num2 = substr($area,2,2);
        $num3 = substr($area,4,2);
        // 根据GB/T2260—999，省市代码11到65
        if(10 < $num1 && $num1 < 66){
            return true;
        }else{
            return false;
        }
        //============
        // 对市 区进行验证
        //============
    }

    // 验证出生日期
    static   private function checkDate($date){
        if(strlen($date) == 6){
            $date1 = substr($date,0,2);
            $date2 = substr($date,2,2);
            $date3 = substr($date,4,2);
            $statusY = self::checkY('19'.$date1);
        }else{
            $date1 = substr($date,0,4);
            $date2 = substr($date,4,2);
            $date3 = substr($date,6,2);
            $nowY = date("Y",time());
            if(1900 < $date1 && $date1 <= $nowY){
                $statusY = self::checkY($date1);
            }else{
                return false;
            }
        }
        if(0<$date2 && $date2 <13){
            if($date2 == 2){
                // 润年
                if($statusY){
                    if(0 < $date3 && $date3 <= 29){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    // 平年
                    if(0 < $date3 && $date3 <= 28){
                        return true;
                    }else{
                        return false;
                    }
                }
            }else{
                $maxDateNum = self::getDateNum($date2);
                if(0<$date3 && $date3 <=$maxDateNum){
                    return true;
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
    }

    // 验证性别
    static   private function checkSex($sex){
        if($sex % 2 == 0){
            return false;
        }else{
            return true;
        }
    }

    // 验证18位身份证最后一位
    static   private function checkEnd($end,$num){
        $checkHou = array(1,0,'x',9,8,7,6,5,4,3,2);
        $checkGu = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2);
        $sum = 0;
        for($i = 0;$i < 17; $i++){
            $sum += (int)$checkGu[$i] * (int)$num[$i];
        }
        $checkHouParameter= $sum % 11;
        if($checkHou[$checkHouParameter] != $num[17]){
            return false;
        }else{
            return true;
        }
    }

    // 验证平年润年，参数年份,返回 true为润年  false为平年
    static  private function checkY($Y){
        if(getType($Y) == 'string'){
            $Y = (int)$Y;
        }
        if($Y % 100 == 0){
            if($Y % 400 == 0){
                return true;
            }else{
                return false;
            }
        }else if($Y % 4 ==  0){
            return true;
        }else{
            return false;
        }
    }

    // 当月天数 参数月份（不包括2月）  返回天数
    static   private function getDateNum($month){
        if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12){
            return 31;
        }else if($month == 2){
        }else{
            return 30;
        }
    }


}