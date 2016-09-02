<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/28
 * Time: 14:46
 */
namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\UHelper;
use yii\web\Controller;

/**
 * Site controller
 */
class BaseController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'except' => ['access/login', 'access/register','access/active'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],//@表示认证用户
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return \Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['/user/access/login']));
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function init()
    {


        parent::init();

        // custom initialization code goes here
    }

    public function actionShareseo($id)
    {
        $request=\Yii::$app->request;

        $model=$this->findModel($id);


        if($request->isPost){

            $share['title']=$request->post('share_title');
            $share['desc']=$request->post('share_desc');
            $img=UHelper::uploadImg('share','','images',0);
            $share['img']=$img['path'];

            $seo['title']=$request->post('seo_title');
            $seo['desc']=$request->post('seo_desc');

            $model->share=json_encode($share);

            $model->seo=json_encode($seo);

            if($model->save()){
                UHelper::alert($model->title.'保存成功！','success');
            }else{
                UHelper::alert($model->title.'保存失败！','error');
            }

            return $this->redirect($request->referrer);
        }

        return $this->render('/layouts/shareseo',[
            'model'=>$model,
        ]);
    }


}