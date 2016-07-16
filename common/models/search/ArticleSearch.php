<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\table\Article;

/**
 * ArticleSearch represents the model behind the search form about `common\models\table\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mid', 'wid', 'isopen', 'isrecommend', 'catid', 'sort_order'], 'integer'],
            [['title', 'mtitle', 'img_list', 'img_title', 'desc', 'content', 'pubtime', 'from', 'link', 'seo', 'share', 'created_at', 'updated_at'], 'safe'],
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
        $query = Article::find();

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
            'mid' => $this->mid,
            'wid' => $this->wid,
            'isopen' => $this->isopen,
            'isrecommend' => $this->isrecommend,
            'catid' => $this->catid,
            'sort_order' => $this->sort_order,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'mtitle', $this->mtitle])
            ->andFilterWhere(['like', 'img_list', $this->img_list])
            ->andFilterWhere(['like', 'img_title', $this->img_title])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'pubtime', $this->pubtime])
            ->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'seo', $this->seo])
            ->andFilterWhere(['like', 'share', $this->share])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
