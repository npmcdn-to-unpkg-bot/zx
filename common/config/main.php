<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'weixin' => [
            'class' => 'common\modules\weixin\WeixinModule',
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\DbCache',
        ],
        'htmlcache' => [
            'class' => 'yii\caching\FileCache',
        ],

    ],
    'language' =>'zh-CN',//中文提示
];
