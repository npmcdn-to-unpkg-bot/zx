<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%plug}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $controller
 * @property string $images
 * @property string $short
 * @property integer $type
 * @property string $is_open
 * @property string $tmpdata
 * @property string $tmpimg
 * @property string $created_at
 * @property string $updated_at
 */
class Plug extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%plug}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'controller'], 'required'],
            [['images', 'short', 'tmpdata', 'tmpimg'], 'string'],
            [['type'], 'integer'],
            [['name', 'controller'], 'string', 'max' => 255],
            [['is_open'], 'string', 'max' => 20],
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
            'name' => '名称',
            'controller' => '所属控制器',
            'images' => '图片数据',
            'short' => '模型描述',
            'type' => '类型',
            'is_open' => '是否可用',
            'tmpdata' => '模板数据',
            'tmpimg' => '模板图片',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PlugQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PlugQuery(get_called_class());
    }
}
