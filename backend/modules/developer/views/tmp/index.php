<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TmpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '模板列表-'.$plugname;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmp-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增模板', ['create','plugid'=>\Yii::$app->request->get('plugid'),'plugname'=>$plugname], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'tmpid',
            [
                'attribute'=>'is_use',
                'value'=>function($model){
                    $arr=['0'=>'已停用','1'=>'已启用'];
                    return $arr[$model->is_use];
                }
            ],
            // 'plugid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
