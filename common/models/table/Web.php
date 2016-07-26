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
 * @property string $wx_appid
 * @property string $wx_appsecret
 * @property string $wx_merchant_number
 * @property string $wx_merchant_key
 * @property string $wx_apiclient_cert
 * @property string $wx_apiclient_key
 * @property string $wx_token
 * @property string $wx_aeskey
 * @property integer $wx_use
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
            [['admin', 'wx_use'], 'integer'],
            [['config', 'wxinfo', 'smtp', 'keyword', 'description'], 'string'],
            [['name', 'wx_merchant_number'], 'string', 'max' => 100],
            [['logo', 'wx_appid', 'wx_appsecret', 'wx_merchant_key', 'wx_apiclient_cert', 'wx_apiclient_key', 'wx_token', 'wx_aeskey'], 'string', 'max' => 255],
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
            'wx_appid' => '公众号appid',
            'wx_appsecret' => '公众号appsecret',
            'wx_merchant_number' => '微信支付商户号',
            'wx_merchant_key' => '微信支付秘钥',
            'wx_apiclient_cert' => '微信支付证书apiclient_cert',
            'wx_apiclient_key' => '微信支付证书apiclient_key',
            'wx_token' => '微信token',
            'wx_aeskey' => '微信EncodingAESKey',
            'wx_use' => '是否使用本公众号的授权接口',
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
