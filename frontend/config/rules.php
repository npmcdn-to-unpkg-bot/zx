<?php
/**
 * Date: 2016/8/22
 * Time: 12:01
 * 路由规则填写
 */

$rules= [

    '<module:\w+>/<controller:\w+>/<id:\d+><action:\w+>' => '<module>/<controller>/<action>',

    '<controller:\w+>/<id:\d+><action:\w+>' => '<controller>/<action>',

    ['class' => 'yii\web\Route'],

];





return $rules;