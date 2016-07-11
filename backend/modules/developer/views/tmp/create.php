<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\table\Tmp */

$this->title = \Yii::$app->request->get('plugname').'-新建模板';
$this->params['breadcrumbs'][] = ['label' => 'Tmps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmp-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
