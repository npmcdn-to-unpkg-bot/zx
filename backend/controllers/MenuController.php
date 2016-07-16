<?php

namespace backend\controllers;

use Yii;
use common\models\table\Menu;
use common\models\search\MenuSearch;
use yii\base\Exception;
use yii\helpers\Json;
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

            $model->img_menu=UHelper::uploadimg('img_menu');

            $model->img_smenu=UHelper::uploadimg('img_smenu');

            if($model->save()){
                UHelper::alert($model->title.'新增成功！','success');
                return $this->redirect(['index']);
            }
        }else{

            if($request->get('type')=='addchild'){
                $model->pid=$request->get('id');
            }

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

        $request=\Yii::$app->request;
        if ($request->isPost) {

            $model->load($request->post());

            $model->img_menu=UHelper::uploadimg('img_menu');

            $model->img_smenu=UHelper::uploadimg('img_smenu');

            if($model->save()){
                UHelper::alert($model->title.'修改成功！','success');
                return $this->redirect(['index']);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
                'plugList'=>\backend\models\DatasModel::plugList(),
                'menuList' =>\backend\models\DatasModel::menuList(),
            ]);
        }
    }


    public function actionTmpset($id)
    {
        $model = $this->findModel($id);

        $request=\Yii::$app->request;
        if ($request->isPost) {

            $model->load($request->post());
            if($model->save()){
                UHelper::alert($model->title.'修改成功！','success');
                return $this->redirect(['index']);
            }
        } else {


            return $this->render('tmpset', [
                'model' => $model,
                'tmpList'=>\backend\models\DatasModel::tmpList($model->type),
            ]);
        }
    }



    /*
     *新建子菜单
     * */
    public function actionCreatechild()
    {
        return $this->redirect(['create','id'=>Yii::$app->request->get('id'),'type'=>'addchild']);
    }

    /*
     *保存排序
     * */
    public function actionSaveorder()
    {
        $request=\Yii::$app->request;
        $return['success']=true;
        $return['msg']='更新成功';
        try{
            if($request->isAjax){
                $ids=$request->post('ids');
                $orders=$request->post('orders');

                foreach($ids as $k=>$v){
                    $model=Menu::findOne($v);
                    $model->sort_order=$orders[$k];
                    if(!$model->save()){
                        throw new Exception('更新失败');
                    }
                    unset($model);
                }
            }else{
                throw new Exception('非法请求');
            }
        }catch (Exception $e){
            $return['success']=false;
            $return['msg']=$e->getMessage();
        }
        \yii\helpers\Json::ajaxreturn($return);
    }

    /*
     * 修改是否显示
     * */
    public function actionSetopen()
    {
        $request=\Yii::$app->request;
        $return['success']=true;
        $return['msg']='更新成功';
        try{
            if($request->isAjax){
                $model=Menu::findOne($request->post('id'));
                $model->is_open=$request->post('isopen');
                if(!$model->save()){
                    throw new Exception('更新失败');
                }
                unset($model);
            }else{
                throw new Exception('非法请求');
            }
        }catch (Exception $e){
            $return['success']=false;
            $return['msg']=$e->getMessage();
        }
        \yii\helpers\Json::ajaxreturn($return);
    }


    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);

        $img_menu=json_decode($model->img_menu,1);
        $img_smenu=json_decode($model->img_smenu,1);

        @unlink(\Yii::getAlias('@uiiroot').$img_menu['path']);

        @unlink(\Yii::getAlias('@uiiroot').$img_smenu['path']);

        $model->delete();
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
