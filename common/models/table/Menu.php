<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property integer $id
 * @property integer $wid
 * @property integer $pid
 * @property string $title
 * @property string $mtitle
 * @property string $description
 * @property integer $type
 * @property string $link
 * @property integer $tmp
 * @property string $tmp_config
 * @property string $img_smenu
 * @property string $img_menu
 * @property string $plist
 * @property string $ext_data
 * @property string $configs
 * @property integer $sort_order
 * @property integer $is_open
 * @property string $configdata
 * @property string $configimg
 * @property string $share
 * @property string $seo
 * @property string $created_at
 * @property string $updated_at
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wid', 'pid', 'title', 'img_menu'], 'required'],
            [['wid', 'pid', 'type', 'tmp', 'sort_order', 'is_open'], 'integer'],
            [['description', 'tmp_config', 'ext_data', 'configs', 'configdata', 'configimg', 'share', 'seo'], 'string'],
            [['title', 'mtitle', 'link', 'plist'], 'string', 'max' => 255],
            [['img_smenu', 'img_menu'], 'string', 'max' => 500],
            [['created_at', 'updated_at'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wid' => '菜单所属用户ID',
            'pid' => '父ID',
            'title' => '标题',
            'mtitle' => '副标题',
            'description' => '描述',
            'type' => '菜单类型',
            'link' => '菜单链接',
            'tmp' => '菜单模板',
            'tmp_config' => '模板配置信息',
            'img_smenu' => '菜单副图标',
            'img_menu' => '菜单图标',
            'plist' => '所有的父菜单id',
            'ext_data' => '额外的数据',
            'configs' => '配置信息，一般拿来保存子菜单需要的配置信息',
            'sort_order' => '排序',
            'is_open' => '是否启用',
            'configdata' => '插件下的额外数据内容',
            'configimg' => '插件下的额外图片数据',
            'share' => '分享设置',
            'seo' => 'SEO配置信息',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MenuQuery(get_called_class());
    }
}
