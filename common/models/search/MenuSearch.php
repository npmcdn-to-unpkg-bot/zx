<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\table\Menu;

/**
 * MenuSearch represents the model behind the search form about `common\models\table\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'wid', 'pid', 'type', 'tmp', 'sort_order', 'is_open'], 'integer'],
            [['title', 'mtitle', 'description', 'link', 'tmp_config', 'images', 'plist', 'ext_data', 'configs', 'configdata', 'configimg', 'share', 'seo', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Menu::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'wid' => $this->wid,
            'pid' => $this->pid,
            'type' => $this->type,
            'tmp' => $this->tmp,
            'sort_order' => $this->sort_order,
            'is_open' => $this->is_open,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'mtitle', $this->mtitle])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'tmp_config', $this->tmp_config])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'plist', $this->plist])
            ->andFilterWhere(['like', 'ext_data', $this->ext_data])
            ->andFilterWhere(['like', 'configs', $this->configs])
            ->andFilterWhere(['like', 'configdata', $this->configdata])
            ->andFilterWhere(['like', 'configimg', $this->configimg])
            ->andFilterWhere(['like', 'share', $this->share])
            ->andFilterWhere(['like', 'seo', $this->seo])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
