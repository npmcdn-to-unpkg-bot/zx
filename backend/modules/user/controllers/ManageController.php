<?php

namespace app\modules\user\controllers;

use common\models\table\User;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\UHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * IndexController implements the CRUD actions for User model.
 */
class ManageController extends Controller
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
            [
                'class' =>\backend\behaviors\UserBehavior::className(),
                'actions'=>['update'],//子帐号只能进入的action
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     * 子账号列表
     */
    public function actionIndex()
    {
        $query=User::find();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
        $query->where(['wid'=>\Yii::$app->user->identity->wid])
            ->andWhere(['>','pid',0])
            ->all();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * 新增子账号
     */
    public function actionCreate()
    {
        $model = new User();
        $request=\Yii::$app->request;
        $sub_counts=User::find()->where(['wid'=>\Yii::$app->user->id])->andFilterWhere(['>','pid',0])->count();
        if($sub_counts>4){
            UHelper::alert('你已建有'.$sub_counts.'个子账号！每个账号最多只能建5个子账号。','error');
            return $this->redirect(['index']);
        }
        if ($request->isPost) {
            if(strlen($request->post('User')['password'])<6){
                UHelper::alert('密码至少6个字符');
            }elseif($model::findOne(['email'=>$request->post("User")['email']])){
                UHelper::alert('邮箱已注册！','error');
            }else{
                $model->name='"'.\Yii::$app->user->identity->name.'"的子账号';
                $model->email=$request->post("User")['email'];
                $model->last_login_time=(string)time();
                $model->last_login_ip=$request->userIP;
                $model->login_times=0;
                $model->role="SUBSER";
                $model->password = \Yii::$app->getSecurity()->generatePasswordHash($request->post('User')['password']);
                $model->auth_key=\Yii::$app->security->generateRandomString();
                $model->access_token=\Yii::$app->security->generateRandomString();
                $model->expire=\Yii::$app->user->identity->expire;
                $model->wid=\Yii::$app->user->identity->wid;
                $model->pid=\Yii::$app->user->identity->id;
                $model->is_active=$request->post('User')['is_active'];
                if($model->validate() && $model->save()){
                    \Yii::info(\Yii::$app->user->id.'账号创建了一个子账号'.$model->id,__METHOD__);
                    UHelper::alert('创建成功！','success');
                }else{
                    UHelper::output($model->errors);
                    UHelper::alert('创建失败！','error');
                }
            }
            return $this->redirect(['index']);
        } else {
            $model->portrait=[['label'=>'图片上传','width'=>'200','height'=>'200']];
            $model->is_active=1;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
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
            $model->portrait=UHelper::uploadimg('portrait');


            if(\Yii::$app->user->identity->pid<1 && $model->wid==\Yii::$app->user->identity->wid){//总账号可以修改密码等
                $model->password=\Yii::$app->security->generatePasswordHash($request->post('changepwd'));
            }
            if($model->save()){
                UHelper::alert('更新成功！','error');
                return $this->redirect($request->referrer);
            }else{
                print_r($model->errors);
                die;
            }
        } else {

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionPassword($id){
        $model = $this->findModel($id);
        $request = \Yii::$app->request;

        if($request->isPost){
            $opwd=$request->post('old_password');
            $npwd=$request->post('new_password');
            $cpwd=$request->post('confirm_password');
            if($npwd==$cpwd && strlen($npwd)>=6 && Yii::$app->security->validatePassword($opwd,$model->password)){
              if(Yii::$app->security->validatePassword($npwd,$model->password)){
                UHelper::alert('新密码不能与原密码相同！','error');
              }else{
                $model->password=Yii::$app->security->generatePasswordHash($npwd);
                if($model->save()){
                    \Yii::info(\Yii::$app->user->id.'修改了密码'.$model->id,__METHOD__);
                    return $this->redirect(Url::toRoute(['access/logout','changepwd'=>1]));
                }else{
                    UHelper::alert('抱歉，密码修改失败！','error');
                }
              }
            }else{
                UHelper::alert('两次输入的密码不一致！','error');
            }
        }
        return $this->render('password',['model'=>$model]);
    }




    public function actionReset($id)
    {
        //http://localhost:8888/admin/user/manage/reset?id=1&reset=123456
//        die;
//        echo \Yii::$app->request->userIP;
//        if(\Yii::$app->request->userIP!=='::1'){
//            die('forbidden');
//        }

        $model = $this->findModel($id);

        $model->password=Yii::$app->security->generatePasswordHash(\Yii::$app->request->get('reset'));

        $model->save();
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
