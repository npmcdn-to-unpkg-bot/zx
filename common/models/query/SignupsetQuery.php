<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\Signupset]].
 *
 * @see \common\models\table\Signupset
 */
class SignupsetQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\Signupset[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\Signupset|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
