<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%oauth2}}".
 *
 * @property integer $id
 * @property integer $wid
 * @property string $openid
 * @property string $wxname
 * @property string $wxpic
 * @property integer $sex
 * @property string $province
 * @property string $city
 * @property string $country
 * @property string $privilege
 * @property string $encrypt
 * @property string $unionid
 * @property string $created_at
 * @property string $updated_at
 */
class Oauth2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%oauth2}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wid', 'sex'], 'integer'],
            [['privilege'], 'string'],
            [['openid', 'wxname', 'province', 'city', 'country', 'encrypt', 'unionid'], 'string', 'max' => 100],
            [['wxpic'], 'string', 'max' => 255],
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
            'wid' => 'wid标识',
            'openid' => '用户的唯一标识',
            'wxname' => '用户昵称',
            'wxpic' => '用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。',
            'sex' => '用户的性别，值为1时是男性，值为2时是女性，值为0时是未知',
            'province' => '用户个人资料填写的省份',
            'city' => '普通用户个人资料填写的城市',
            'country' => '国家，如中国为CN',
            'privilege' => '用户特权信息，json 数组，如微信沃卡用户为（chinaunicom）',
            'encrypt' => '加密字符串',
            'unionid' => '只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\Oauth2Query the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\Oauth2Query(get_called_class());
    }
}
