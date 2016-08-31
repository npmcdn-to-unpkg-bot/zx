<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);

$this->title=$this->title?$this->title:'露露';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="WEBID" content="<?= \Yii::$app->params['WEBID'] ?>">
    <meta name="HOSTINFO" content="<?= \Yii::$app->request->hostInfo ?>" >
    <meta name="SOURCEPATH" content="<?= SOURCEPATH ?>" >
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?= frontend\widgets\LoadingWidget::widget()?>
<?php $this->beginBody() ?>

<?= $content ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
