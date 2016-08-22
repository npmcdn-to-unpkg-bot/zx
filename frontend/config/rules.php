<?php
/**
 * Date: 2016/8/22
 * Time: 12:01
 * 路由规则填写
 */

$rules= [
    '<controller:\w+>/<id:\d+><action:\w+>' => '<controller>/<action>',

//    'index/<id:\d+>/<action:(index | view)>' => '<controller>/<action>',


    ['class' => 'yii\web\Route'],

];





return $rules;