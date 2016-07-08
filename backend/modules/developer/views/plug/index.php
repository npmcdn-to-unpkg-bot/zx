<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PlugSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '插件列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plug-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建插件', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'controller',
            [
                'attribute'=>'type',
                'value'=>function($model){
                    $typearr=['1'=>'通用插件','2'=>'活动插件'];
                    return $typearr[$model->type];
                }
            ],
            [
                'attribute'=>'is_open',
                'value'=>function($model){
                    $arr=['0'=>'已停用','1'=>'已启用'];
                    return $arr[$model->is_open];
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{tmpset}{delete}',
                'buttons'=>[
                    'tmpset'=>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', '内容管理'),
                            'aria-label' => Yii::t('yii', 'Smpset'),
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=['tmp/index','plugid'=>$model->id];
                        return Html::a('<span class="glyphicon glyphicon-briefcase"></span>', $url, $options);
                    },
                ]
            ],
        ],
    ]); ?>
</div>
