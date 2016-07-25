<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\Upload]].
 *
 * @see \common\models\table\Upload
 */
class UploadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\Upload[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\Upload|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
