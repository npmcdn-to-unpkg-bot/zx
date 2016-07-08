<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\table\Plug */

$this->title = '新增插件';
$this->params['breadcrumbs'][] = ['label' => 'Plugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plug-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
