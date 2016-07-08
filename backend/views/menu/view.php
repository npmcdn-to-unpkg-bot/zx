<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\table\Menu */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">

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
            'wid',
            'pid',
            'title',
            'mtitle',
            'description:ntext',
            'type',
            'link',
            'tmp',
            'tmp_config:ntext',
            'images:ntext',
            'plist',
            'ext_data:ntext',
            'configs:ntext',
            'sort_order',
            'is_open',
            'configdata:ntext',
            'configimg:ntext',
            'share:ntext',
            'seo:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
