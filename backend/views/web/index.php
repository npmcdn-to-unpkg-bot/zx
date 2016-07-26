<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\WebSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Webs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Web', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'admin',
            'name',
            'logo',
            'config:ntext',
            // 'wx_appid',
            // 'wx_appsecret',
            // 'wx_merchant_number',
            // 'wx_merchant_key',
            // 'wx_apiclient_cert',
            // 'wx_apiclient_key',
            // 'wx_use',
            // 'wxinfo:ntext',
            // 'smtp:ntext',
            // 'keyword:ntext',
            // 'description:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
