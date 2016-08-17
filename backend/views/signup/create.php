<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\table\Signup */

$this->title = 'Create Signup';
$this->params['breadcrumbs'][] = ['label' => 'Signups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
