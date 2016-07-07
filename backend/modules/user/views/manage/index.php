<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '子账户列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('新增子账户', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'pid',
            'name',
//            'password',
//             'nickname',
            // 'portrait',
             'last_login_time:datetime',
             'last_login_ip',
             'login_times',
             'email:email',
            // 'role',
            // 'created_at',
            // 'updated_at',
            // 'auth_key',
            // 'access_token',
             [
                 'attribute'=>'is_active',
                 'header'=>'状态',
                 'value'=>function($model){
                     if($model->is_active>0){
                         return '已启用';
                     }else{
                         return '未启用';
                     }
                 }
             ],
            // 'expire',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{manage}{createchild}{delete}',
                'buttons'=>[
                    'update'=>function ($url,$model,$key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', '编辑'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=['update','id'=>$model['id']];
                        return Html::a('<span class="glyphicon glyphicon-pencil">编辑</span>', $url, $options);
                    },
                    'subpassword'=>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', '修改密码'),
                            'aria-label' => Yii::t('yii', 'Subpassword'),
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=['subpassword','id'=>$model['id']];
                        return Html::a('<span class="glyphicon glyphicon-briefcase">修改密码</span>', $url, $options);
                    },
                    'delete'=>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', '删除'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', '你确定要删除这条记录吗'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=['delete','id'=>$model['id']];
                        return Html::a('<span class="glyphicon glyphicon-trash">删除</span>', $url, $options);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
