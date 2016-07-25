<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%upload}}".
 *
 * @property integer $id
 * @property integer $wid
 * @property integer $mid
 * @property integer $cid
 * @property integer $uid
 * @property string $title
 * @property string $link
 * @property integer $width
 * @property integer $height
 * @property string $path
 * @property string $type
 * @property string $size
 * @property string $desc
 * @property integer $isuse
 * @property string $created_at
 * @property string $updated_at
 */
class Upload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%upload}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wid', 'mid', 'uid'], 'integer'],
            [['title', 'link', 'path', 'type', 'desc'], 'string', 'max' => 100],
            [['size'], 'string', 'max' => 10],
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
            'wid' => '网站id',
            'mid' => '菜单id',
            'cid' => '辨别id',
            'uid' => '上传用户id',
            'title' => '图片名称',
            'link' => '链接',
            'width' => '宽度',
            'height' => '高度',
            'path' => '图片路径',
            'type' => '类型',
            'size' => '大小',
            'desc' => '描述',
            'isuse' => '是否再用',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\UploadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UploadQuery(get_called_class());
    }
}
