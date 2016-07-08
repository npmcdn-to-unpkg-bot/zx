<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\Menu]].
 *
 * @see \common\models\table\Menu
 */
class MenuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\Menu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\Menu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
