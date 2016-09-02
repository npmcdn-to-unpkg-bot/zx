<?php

namespace backend\controllers;

use Yii;
use common\models\table\Web;
use common\models\search\WebSearch;
use yii\helpers\UHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\BaseController;

/**
 * WebController implements the CRUD actions for Web model.
 */
class WebController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Web models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->identity->wid>1){
            throw new ForbiddenHttpException('无权限');
        }

        $searchModel = new WebSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionWebset()
    {
        $model= Web::findOne(\Yii::$app->user->identity->wid);

        $request=\Yii::$app->request;

        if($request->isPost){






        }else{
            return $this->render('webset',[
                'model' => $model,
            ]);
        }

    }



    /**
     * Displays a single Web model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Web model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Web();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Web model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $request=\Yii::$app->request;

        if ($request->isPost) {

            $model->load($request->post());

            $model->logo= UHelper::uploadImg('logo');

            if($model->save()){
                UHelper::alert('保存成功！','success');
            }else{
                UHelper::alert('保存失败！'.$model->errors[0],'error');
            }
            return $this->redirect($request->referrer);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionWxinfo($id)
    {

        $model= $this->findModel($id);

        $model->loadDefaultValues();

        $request=\Yii::$app->request;

        if($request->isPost){

            $model->load($request->post());

            $apiclient_cert=json_decode(UHelper::uploadSafeFile('wx_apiclient_cert'),1);

            $apiclient_key =json_decode(UHelper::uploadSafeFile('wx_apiclient_key'),1);

            $model->wx_apiclient_cert=$apiclient_cert['path'];

            $model->wx_apiclient_key=$apiclient_key['path'];

            if($model->save()){
                UHelper::alert('保存成功！','success');
            }else{
                UHelper::alert('保存失败！'.$model->errors[0],'error');
            }
            return $this->redirect($request->referrer);

        }else{

            $model->wx_apiclient_cert=json_encode(['path'=> $model->wx_apiclient_cert]);

            $model->wx_apiclient_key=json_encode(['path'=> $model->wx_apiclient_key]);

            return $this->render('wxinfo',[
                'model' => $model,
            ]);
        }

    }


    /**
     * Deletes an existing Web model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Web model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Web the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Web::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('页面不存在！');
        }
    }
}
