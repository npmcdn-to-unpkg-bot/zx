<?php
/**
 * Date: 2016/8/24
 * Time: 16:26
 * 报名
 */

namespace frontend\controllers;

use yii\helpers\UHelper;
use yii\web\Controller;
use yii\helpers\Url;
use frontend\controllers\BaseController;
use common\models\table\Signupset;
use common\models\table\Signup;

class SignupController extends BaseController
{

    public function actionIndex($id)
    {

        $model=Signupset::find()->where(['mid'=>$id])->one();

        return $this->render('index',[
            'model'=>$model,
        ]);
    }



}