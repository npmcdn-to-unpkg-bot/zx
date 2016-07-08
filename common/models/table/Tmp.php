<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%tmp}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $tmpid
 * @property integer $is_use
 * @property string $images
 * @property string $configs
 * @property integer $plugid
 * @property string $short
 * @property string $created_at
 * @property string $updated_at
 * @property string $imageset
 */
class Tmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tmp}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tmpid', 'is_use', 'plugid'], 'integer'],
            [['images', 'configs', 'short', 'imageset'], 'string'],
            [['name'], 'string', 'max' => 255],
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
            'name' => '模板名称',
            'tmpid' => '模板自定义ID',
            'is_use' => '是否启用',
            'images' => '样例图片',
            'configs' => '模板的额外数据',
            'plugid' => '模板所属的插件ID',
            'short' => '模板描述',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'imageset' => '模板图片设置',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\TmpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TmpQuery(get_called_class());
    }
}
