<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\table\Plug */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Plugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plug-view">

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
            'name',
            'controller',
            'images:ntext',
            'short:ntext',
            'type',
            'is_open',
            'tmpdata:ntext',
            'tmpimg:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
