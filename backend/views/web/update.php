<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\table\Web */

$this->title = '网站信息: ' . $model->name;
?>
<div class="web-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
