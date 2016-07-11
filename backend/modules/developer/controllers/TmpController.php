<?php

namespace backend\modules\developer\controllers;

use Yii;
use common\models\table\Tmp;
use common\models\search\TmpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TmpController implements the CRUD actions for Tmp model.
 */
class TmpController extends Controller
{


    /**
     * Lists all Tmp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TmpSearch();

        $params=Yii::$app->request->queryParams;
        $params['TmpSearch']['plugid']=\Yii::$app->request->get('plugid');

        $plugname=\common\models\table\Plug::find()->where(['id'=>\Yii::$app->request->get('plugid')])->select('name')->asArray()->one();


        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'plugname'=>$plugname['name']
        ]);
    }

    /**
     * Displays a single Tmp model.
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
     * Creates a new Tmp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tmp();

        $request=Yii::$app->request;

        if ($request->isPost) {

            $model->load($request->post());

            $maxmodel=Tmp::find()->where(['plugid'=>$request->post('Tmp')['plugid']])->select('MAX(tmpid)')->asArray()->one();

            $model->tmpid=$maxmodel['MAX(tmpid)']+1;

            if($model->save()){
                \yii\helpers\UHelper::alert($model->name.'新增成功！');
                return $this->redirect(['index','plugid'=>$model->plugid]);
            }
        } else {
            $model->loadDefaultValues();

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tmp model.
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

            if($model->save()){
                return $this->redirect(['index','plugid'=>$model->plugid]);
            }

        } else {
            $plugname=\common\models\table\Plug::find()->where(['id'=>$model->plugid])->select('name')->asArray()->one();

            return $this->render('update', [
                'model' => $model,
                'plugname'=>$plugname['name']
            ]);
        }
    }

    /**
     * Deletes an existing Tmp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);


        $model->delete();

        return $this->redirect(['index','plugid'=>$model->plugid]);
    }

    /**
     * Finds the Tmp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tmp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tmp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
