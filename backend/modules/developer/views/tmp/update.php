<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\table\Tmp */

$this->title = $plugname.'-更新模板: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tmps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tmp-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
