<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SignupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Signups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signup-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('报名设置', ['signupset','mid'=>\Yii::$app->request->get('mid')], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'tel',
             [
                 'attribute' => 'sex' ,
                 'value' => function($model){
                     $sex=[0=>'未知',1=>'男',2=>'女'];

                     return $sex[$model->sex];
                 }
             ],
             [
                 'attribute' => 'created_at',
                 'format' => 'Datetime',
             ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{delete}',
            ],
        ],
    ]); ?>
</div>
