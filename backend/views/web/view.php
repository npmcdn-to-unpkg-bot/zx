<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\table\Web */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Webs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'admin',
            'name',
            'logo',
            'config:ntext',
            'wx_appid',
            'wx_appsecret',
            'wx_merchant_number',
            'wx_merchant_key',
            'wx_apiclient_cert',
            'wx_apiclient_key',
            'wx_use',
            'wxinfo:ntext',
            'smtp:ntext',
            'keyword:ntext',
            'description:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
