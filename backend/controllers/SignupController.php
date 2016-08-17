<?php

namespace backend\controllers;

use Yii;
use common\models\table\Signup;
use common\models\search\SignupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SignupController implements the CRUD actions for Signup model.
 * 报名
 */
class SignupController extends Controller
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
     * Lists all Signup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SignupSearch();

        $params=Yii::$app->request->queryParams;
        $params['SignupSearch']['mid']=\Yii::$app->request->get('mid');
        if(!\Yii::$app->request->get('mid')){
            throw new NotFoundHttpException('页面不存在！');
        }

        $params['SignupSearch']['wid']=\Yii::$app->user->identity->wid;


        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Signup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /*
     * signupset
     * */
    public function actionSignupset($mid){

        $model=new \common\models\table\Signupset();

        if(!$model->find()->where(['mid'=>$mid])->one()){
            $model->wid=\Yii::$app->user->identity->wid;
            $model->mid=$mid;
            $model->save();
        }



        if(\Yii::$app->request->isPost){

        }

        return $this->render('signupset',['model'=>$model]);



    }




    /**
     * Creates a new Signup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Signup();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Signup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Signup model.
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
     * Finds the Signup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Signup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Signup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
