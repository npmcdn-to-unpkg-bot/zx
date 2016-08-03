<?php
/**
 * Date: 2016/8/3
 * Time: 17:03
 */

namespace frontend\controllers;

use yii\web\Controller;

class IndexController extends Controller
{


    public function actionIndex()
    {




        return $this->renderPartial('index');
    }


}