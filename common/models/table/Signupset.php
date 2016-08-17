<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%signupset}}".
 *
 * @property integer $id
 * @property integer $wid
 * @property integer $mid
 * @property string $title
 * @property string $stime
 * @property string $etime
 * @property integer $limit
 * @property string $extend
 * @property string $created_at
 * @property string $updated_at
 * @property string $extinfo
 */
class Signupset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%signupset}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wid', 'mid', 'limit'], 'integer'],
            [['extend', 'extinfo'], 'string'],
            [['title'], 'string', 'max' => 100],
            [['stime', 'etime', 'created_at', 'updated_at'], 'string', 'max' => 20],
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
            'mid' => 'Mid',
            'title' => '报名活动名称',
            'stime' => '报名开始时间',
            'etime' => '报名结束时间',
            'limit' => '人数限制',
            'extend' => '扩展字段',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'extinfo' => '额外数据',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\SignupsetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SignupsetQuery(get_called_class());
    }
}
