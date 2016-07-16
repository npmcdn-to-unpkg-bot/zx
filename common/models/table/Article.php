<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property integer $mid
 * @property integer $wid
 * @property string $title
 * @property string $mtitle
 * @property string $img_list
 * @property string $img_title
 * @property string $desc
 * @property string $content
 * @property string $pubtime
 * @property string $from
 * @property string $link
 * @property integer $isopen
 * @property integer $isrecommend
 * @property integer $catid
 * @property integer $sort_order
 * @property string $seo
 * @property string $share
 * @property string $created_at
 * @property string $updated_at
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mid', 'wid', 'isopen', 'isrecommend', 'catid', 'sort_order'], 'integer'],
            [['content', 'seo', 'share'], 'string'],
            [['title', 'mtitle', 'from', 'link'], 'string', 'max' => 100],
            [['img_list', 'img_title', 'desc'], 'string', 'max' => 500],
            [['pubtime', 'created_at', 'updated_at'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => '菜单id',
            'wid' => 'Wid',
            'title' => '标题',
            'mtitle' => '副标题',
            'img_list' => '列表图片',
            'img_title' => '文字头图',
            'desc' => '描述',
            'content' => '内容',
            'pubtime' => '发布时间',
            'from' => '来源',
            'link' => '外链',
            'isopen' => '是否显示',
            'isrecommend' => '是否推荐',
            'catid' => '分类id',
            'sort_order' => '排序',
            'seo' => 'SEO信息',
            'share' => '分享信息',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ArticleQuery(get_called_class());
    }
}
