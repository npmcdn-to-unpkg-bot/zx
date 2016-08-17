<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\Signup]].
 *
 * @see \common\models\table\Signup
 */
class SignupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\Signup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\Signup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
