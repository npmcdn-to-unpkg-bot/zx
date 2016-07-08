<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\table\Tmp;

/**
 * TmpSearch represents the model behind the search form about `common\models\table\Tmp`.
 */
class TmpSearch extends Tmp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tmpid', 'is_use', 'plugid'], 'integer'],
            [['name', 'images', 'configs', 'short', 'created_at', 'updated_at', 'imageset'], 'safe'],
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
        $query = Tmp::find();

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
            'tmpid' => $this->tmpid,
            'is_use' => $this->is_use,
            'plugid' => $this->plugid,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'configs', $this->configs])
            ->andFilterWhere(['like', 'short', $this->short])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'imageset', $this->imageset]);

        return $dataProvider;
    }
}
