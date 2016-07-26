<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\table\Web;

/**
 * WebSearch represents the model behind the search form about `common\models\table\Web`.
 */
class WebSearch extends Web
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'admin', 'wx_use'], 'integer'],
            [['name', 'logo', 'config', 'wx_appid', 'wx_appsecret', 'wx_merchant_number', 'wx_merchant_key', 'wx_apiclient_cert', 'wx_apiclient_key', 'wxinfo', 'smtp', 'keyword', 'description', 'created_at', 'updated_at'], 'safe'],
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
        $query = Web::find();

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
            'admin' => $this->admin,
            'wx_use' => $this->wx_use,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'config', $this->config])
            ->andFilterWhere(['like', 'wx_appid', $this->wx_appid])
            ->andFilterWhere(['like', 'wx_appsecret', $this->wx_appsecret])
            ->andFilterWhere(['like', 'wx_merchant_number', $this->wx_merchant_number])
            ->andFilterWhere(['like', 'wx_merchant_key', $this->wx_merchant_key])
            ->andFilterWhere(['like', 'wx_apiclient_cert', $this->wx_apiclient_cert])
            ->andFilterWhere(['like', 'wx_apiclient_key', $this->wx_apiclient_key])
            ->andFilterWhere(['like', 'wxinfo', $this->wxinfo])
            ->andFilterWhere(['like', 'smtp', $this->smtp])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
