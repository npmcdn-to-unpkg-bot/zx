<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\table\Plug */

$this->title = '更新插件: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Plugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plug-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
