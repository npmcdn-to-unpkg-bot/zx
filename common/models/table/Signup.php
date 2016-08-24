<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%signup}}".
 *
 * @property integer $id
 * @property integer $wid
 * @property string $openid
 * @property string $name
 * @property string $tel
 * @property integer $mid
 * @property integer $sex
 * @property integer $age
 * @property integer $st
 * @property string $info
 * @property string $created_at
 * @property string $updated_at
 */
class Signup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%signup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wid', 'mid', 'sex', 'age', 'st'], 'integer'],
            [['info'], 'string'],
            [['openid'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 30],
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
            'wid' => 'Wid',
            'openid' => 'Openid',
            'name' => '姓名',
            'tel' => '电话',
            'mid' => '菜单id',
            'sex' => '性别',
            'age' => '年龄',
            'st' => '状态',
            'info' => '额外数据',
            'created_at' => '提交时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\SignupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SignupQuery(get_called_class());
    }
}
