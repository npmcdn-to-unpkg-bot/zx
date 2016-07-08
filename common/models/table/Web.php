<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%web}}".
 *
 * @property integer $id
 * @property integer $admin
 * @property string $name
 * @property string $logo
 * @property string $config
 * @property string $wxinfo
 * @property string $smtp
 * @property string $keyword
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class Web extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%web}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin'], 'required'],
            [['admin'], 'integer'],
            [['config', 'wxinfo', 'smtp', 'keyword', 'description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['logo'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin' => '管理员id',
            'name' => '网站名称',
            'logo' => '网站LOGO',
            'config' => '配置',
            'wxinfo' => 'Wxinfo',
            'smtp' => 'SMTP邮箱配置',
            'keyword' => '网站关键字',
            'description' => '网站描述',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\WebQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\WebQuery(get_called_class());
    }
}
