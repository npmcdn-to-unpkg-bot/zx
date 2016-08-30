<?php
/**
 * Date: 2016/8/25
 * Time: 10:00
 */
namespace frontend\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\UHelper;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use common\models\table\Signup;
use common\models\table\Signupset;

class SignupModel extends Model
{

    public $data_model;

    public $set_model;

    public $mid;

    public $wid;

    public function __construct($mid)
    {

        $this->mid=$mid;

        $this->wid=\Yii::$app->params['WEBID'];

        $this->data_model=Signup::find()->where(['mid'=>$mid,'wid'=>$this->wid])->one();

        $this->set_model=Signupset::find()->where(['mid'=>$mid,'wid'=>$this->wid])->one();

        if($this->set_model === null){
            throw new NotFoundHttpException('报名活动不存在！');
        }

    }

    /*
     * 返回报名设置
     * */
    public function getSet()
    {
        return $this->set_model;
    }

    /*
     * 检查是否在报名期间,返回检查的状态
     * */
    public function checkTime()
    {

        if(time()<strtotime($this->set_model->stime)){
            //"报名时间未开始！";
            return 'stime';
        }

        if(time()>strtotime($this->set_model->etime)){
            //"报名时间已截止！";
            return 'etime';
        }

        return '';

    }

    /*
     * 检查是否已报名，报名了的话返回数据
     * */
    public function checkRecorde($tel='',$openid='')
    {
        if($tel=='' && $openid==''){
            throw new NotFoundHttpException('缺少参数');
        }


        $model=Signup::find()->where(['mid'=>$this->mid,'wid'=>$this->wid]);

        if($tel){

            $model->andWhere(['tel'=>$tel]);
        }

        if($openid){

            $model->andWhere(['openid'=>$openid]);
        }

        $data=$model->one();



        if($data !== null){
            return $data;
        }else{
            return '';
        }

    }


    /*
     * 检查报名人数是否已满
     * */
    public function checkLimit()
    {
        $count=Signup::find()->where(['wid'=>$this->wid,'mid'=>$this->mid])->count();

        if($count>=$this->set_model->limit){
            return true;
        }else{
            return false;
        }

    }


    /*
     * 保存数据
     * */
    public function saveData(){

    }


}