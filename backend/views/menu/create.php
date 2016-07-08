<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\table\Menu */

$this->title = '新建菜单';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">


    <?= $this->render('_form', [
        'model' => $model,
        'plugList'=>$plugList,
        'menuList' =>$menuList,
    ]) ?>

</div>
