<?php
/**
 * Date: 2016/8/24
 * Time: 16:26
 * 报名
 */

namespace frontend\controllers;

use yii\base\Exception;
use yii\helpers\Json;
use yii\helpers\UHelper;
use yii\web\Controller;
use yii\helpers\Url;
use frontend\controllers\BaseController;
//use common\models\table\Signupset;
use common\models\table\Signup;
use frontend\models\SignupModel;

class SignupController extends BaseController
{

    public function actionIndex($id)
    {

        $request=\Yii::$app->request;

        $model=new SignupModel($id);

        $set=$model->getSet();

        $openid='openid';

        $checktime=$model->checkTime();

        if($checktime != ''){

            if($checktime=='stime'){

                UHelper::tips('报名未开始！');

            }else{

                UHelper::tips('报名已结束！');

            }

        }

        if($model->checkLimit()){

            UHelper::tips('报名人数已满！');
        }


        if($request->isPost){

            $return['success']=true;
            $return['msg']="报名成功！";

            try{

                if(isset(\Yii::$app->params['showtips'])){

                    throw new Exception(\Yii::$app->params['tips']);

                }

                if($model->checkRecorde($request->post('tel'),$openid)){
                    throw new Exception('你已经报过名了');
                }

                if(\yii\helpers\ValidateHelper::mobilePhone($request->post('tel')) == false){

                    throw new Exception('手机号格式不正确！');

                }

                $signup=new Signup();

                $signup->openid=$openid;

                $signup->mid = $id;

                $signup->sex = $request->post('sex');

                $signup->age = $request->post('age');

                $signup->name= $request->post('name');

                $signup->tel = $request->post('tel');

                $signup->wid = \Yii::$app->params['WEBID'];

                if(!$signup->save()){

                    throw new Exception("抱歉，网络错误！请稍后再试");

                }

            }catch (Exception $e){

                $return['success']=false;

                $return['msg']=$e->getMessage();

            }

            if($request->isAjax){

                Json::ajaxreturn($return);

            }else{

                UHelper::flash($return['msg']);

                return $this->redirect($request->referrer);

            }
        }

        return $this->render('index',[

            'data'=>$set,

            'info'=>$model->checkRecorde('',$openid),

        ]);

    }

}