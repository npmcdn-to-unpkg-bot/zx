<?php

namespace backend\controllers;

use Yii;
use common\models\table\Menu;
use common\models\search\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\helpers\UHelper;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends BaseController
{

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new MenuSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);

        $searchModel = new MenuSearch();

        $MenuSearch=Yii::$app->request->get('MenuSearch');
        if(!$MenuSearch){
            $menuList=Menu::find()
                ->where(['wid'=>Yii::$app->user->identity->wid])
                ->leftJoin('{{%plug}}','{{%plug}}.id={{%menu}}.type')
                ->select('{{%menu}}.*,{{%plug}}.name as typename,{{%plug}}.controller as controller')
                ->orderBy('sort_order')
                ->asArray()->all();
            $menuList=ArrayHelper::createTree($menuList);
            $menuList=ArrayHelper::treeTosingle($menuList);
            foreach ($menuList as $key=>$item) {
                if(!empty($item['children'])){
                    $menuList[$key]['is_bottom']=0;
                }else{
                    $menuList[$key]['is_bottom']=1;
                }
                unset($menuList[$key]['children']);
            }
            $render='index';
        }else{//搜索的时候
            $menuList=Menu::find()
                ->where(['wid'=>Yii::$app->user->identity->wid])
                ->leftJoin('{{%plug}}','{{%plug}}.id={{%menu}}.type')
                ->select('{{%menu}}.*,{{%plug}}.name as typename,{{%plug}}.controller as controller')
                ->orderBy('sort_order')
                ->andFilterWhere(['like', '{{%menu}}.title', $MenuSearch['title']])
                ->andFilterWhere(['{{%menu}}.type'=>$MenuSearch['type']])
                ->asArray()->all();
            $render='filter';
        }


        $model=$menuList;

        $dataProvider=new \yii\data\ArrayDataProvider([
            'allModels' => $model,
            'pagination' => [
                'pageSize' => 200,
            ],
            'sort' => [
                'attributes' => ['id desc','sort_order asc'],
            ],
        ]);

        return $this->render($render, [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();
        $model->loadDefaultValues();
        $request = Yii::$app->request;
        $allMenu=$model::find()->where(['wid'=>Yii::$app->user->identity->wid])->count();
        if($allMenu>=200){
            UHelper::alert('每个账号最多建200个菜单','error');
            return $this->redirect(['index']);
        }
        if($request->isPost){
            $model->load($request->post());
            if($model->save()){
                UHelper::alert($model->title.'新增成功！','success');
                return $this->redirect($request->referrer);
            }
        }else{

            return $this->render('create', [
                'model' => $model,
                'plugList'=>\backend\models\DatasModel::plugList(),
                'menuList' =>\backend\models\DatasModel::menuList(),
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
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
     * Deletes an existing Menu model.
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
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
