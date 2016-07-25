<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property integer $wid
 * @property integer $pid
 * @property string $name
 * @property string $password
 * @property string $nickname
 * @property string $portrait
 * @property string $last_login_time
 * @property string $last_login_ip
 * @property integer $login_times
 * @property string $email
 * @property string $role
 * @property string $created_at
 * @property string $updated_at
 * @property string $auth_key
 * @property string $access_token
 * @property integer $is_active
 * @property string $expire
 * @property string $menulist
 * @property string $rightlist
 * @property string $extdata
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wid', 'pid', 'login_times', 'is_active'], 'integer'],
            [['menulist', 'rightlist', 'extdata'], 'string'],
            [['name', 'password', 'nickname','email', 'auth_key', 'access_token'], 'string', 'max' => 100],
            [['last_login_time', 'role', 'created_at', 'updated_at', 'expire'], 'string', 'max' => 20],
            [['last_login_ip'], 'string', 'max' => 30],
            [['portrait'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wid' => '网站ID',
            'pid' => '父用户ID',
            'name' => '用户名',
            'password' => '密码',
            'nickname' => '昵称',
            'portrait' => '头像',
            'last_login_time' => '上次登录时间',
            'last_login_ip' => '上次登录IP',
            'login_times' => '总登录次数',
            'email' => '邮箱',
            'role' => '角色',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'auth_key' => '认证字符串',
            'access_token' => '验证token',
            'is_active' => '账户是否可用',
            'expire' => '过期时间',
            'menulist' => '子账号课件的菜单列表',
            'rightlist' => '权限列表',
            'extdata' => '额外数据',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserQuery(get_called_class());
    }
}
