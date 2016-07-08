<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2015/12/26
 * Time: 20:42
 * 后台左侧菜单
 */
namespace backend\widgets;

use yii\base\Widget;
use common\models\table\Menu;
use yii\helpers\ArrayHelper;
use common\helper\UHelper;
class BeyondmenuWidget extends Widget
{
    public $data;


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $menuList=Menu::find()
            ->where(['wid'=>\Yii::$app->user->identity->wid])
            ->leftJoin('{{%plug}}','{{%plug}}.id={{%menu}}.type')
            ->select('{{%menu}}.*,{{%plug}}.name as typename,{{%plug}}.controller as controller')
            ->orderBy('sort_order')->asArray()->all();
        $data=ArrayHelper::createTree($menuList);
        $plist=ArrayHelper::treeGetplist($data,\Yii::$app->request->get('mid'));
        return $this->render('beyondmenu',[
            'data'=>$data,
            'plist'=>$plist,
            'route'=>\Yii::$app->controller->route,
        ]);
    }
}