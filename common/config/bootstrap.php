<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

/*
 * 网站域名
 * */
Yii::setAlias('@webhost',$_SERVER['HTTP_HOST']);
/*
 * 文件上传返回路径
 * */
Yii::setAlias('@uploadreturn','/upload');
/*
 *文件上传路径
 * */
Yii::setAlias('@upload',dirname(dirname(__DIR__)) . '/web/upload');
/*
 * 网站根目录，区别于系统的@webroot
 * */
Yii::setAlias('@uiiroot',dirname(dirname(__DIR__)) . '/web');
/*
 * 微信信息的日志文件
 * */
Yii::setAlias('@wxlog',dirname(__DIR__) . '/weixin/log/wx.log');




