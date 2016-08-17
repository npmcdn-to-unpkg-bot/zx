<?php

namespace backend\controllers;

use common\models\search\ArticleSearch;
use common\models\table\Article;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\UHelper;
use yii\web\NotFoundHttpException;

/**
 * ArticleController implements the CRUD actions for Article model.
 * 文章
 */
class ArticleController extends BaseController
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();

        $params=Yii::$app->request->queryParams;
        $params['ArticleSearch']['mid']=\Yii::$app->request->get('mid');
        if(!\Yii::$app->request->get('mid')){
            throw new NotFoundHttpException('页面不存在！');
        }

        $params['ArticleSearch']['wid']=\Yii::$app->user->identity->wid;

        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        $request=Yii::$app->request;

        if ($request->isPost) {
            $model->load($request->post());

            $model->img_list=UHelper::uploadimg('img_list');

            $model->img_title=UHelper::uploadimg('img_title');

            if($model->save()){
                UHelper::alert($model->title.'新增成功！可继续添加','success');
            }else{
                UHelper::alert('新增失败！','error');
            }

            return $this->redirect($request->referrer);


        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
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

            $model->img_list=UHelper::uploadimg('img_list');

            $model->img_title=UHelper::uploadimg('img_title');

            if($model->save()){
                UHelper::alert($model->title.'修改成功！','success');
                return $this->redirect(['index','mid'=>$model->mid]);
            }else{
                UHelper::alert($model->title.'修改失败！','error');
                return $this->redirect($request->referrer);
            }


        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model=$this->findModel($id);

        $img_list=json_decode($model->img_list,1);
        $img_title=json_decode($model->img_title,1);

        @unlink(\Yii::getAlias('@uiiroot').$img_list['path']);

        @unlink(\Yii::getAlias('@uiiroot').$img_title['path']);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::find()->where(['id'=>$id,'wid'=>\Yii::$app->user->identity->wid])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('页面不存在！');
        }
    }
}
