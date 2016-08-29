<?php

namespace frontend\modules\controllers;

use yii\web\Controller;

/**
 * Default controller for the `member` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        \yii\helpers\UHelper::pre(\Yii::$app->request->get());

        \yii\helpers\UHelper::pre(\Yii::$app->params);

        echo 123123;
        die;


        return $this->render('index');
    }
}
