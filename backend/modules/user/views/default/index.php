<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增用户', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'user_name',
//            'user_password',
//            'user_nickname',
//            'user_portrait',
             ['attribute'=>'create_time',
                 'format'=>['date','php:Y-m-d'],
             ],
            ['attribute'=>'last_login_time',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
             'last_login_ip',
//             'login_times',
             'user_email:email',
             ['attribute'=>'user_role','value'=>function($data){
                 $array=array('ADMIN'=>'管理员','USER'=>'普通用户');
                 return $array[$data->user_role];
             }],

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}',
//             'template'=>'{update} {delete}{createchild}{add}',
//                'buttons'=>[
//                    'add'=>function ($url, $model, $key) {
//                        $options = array_merge([
//                            'title' => Yii::t('yii', '添加菜单'),
//                            'aria-label' => Yii::t('yii', 'add'),
//                            'data-pjax' => '0',
//                        ]);
//                        return Html::a('<span class="glyphicon glyphicon-plus">添加菜单</span>', $url, $options);
//                    }
//                ],
            ],
//            [
//                'label'=>'更多操作',
//                'format'=>'raw',
//                'value' => function($data){
//                    $url = \yii\helpers\Url::toRoute(['user/addSub','id'=>$data->user_id]);
//                    return Html::a('添加权限组', $url, ['title' => '审核']).Html::a('添加权限组', $url, ['title' => '审核']);
//                }
//            ]
        ],
    ]); ?>

</div>
