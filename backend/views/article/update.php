<?php

/* @var $this yii\web\View */
/* @var $model common\models\table\Article */

$this->title = '更新文章: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
