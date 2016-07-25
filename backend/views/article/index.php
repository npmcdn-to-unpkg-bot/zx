<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('新增文章', ['create','mid'=>\Yii::$app->request->get('mid')], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'title',
             'isopen',
             'isrecommend',
             'sort_order',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{shareseo}{delete}',
                'buttons'=>[
                    'shareseo'=>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', '分享，SEO配置'),
                            'aria-label' => Yii::t('yii', 'shareseo'),
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=['shareseo','id'=>$model->id];
                        return Html::a('<span class="glyphicon glyphicon-share-alt"></span>', $url, $options);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
