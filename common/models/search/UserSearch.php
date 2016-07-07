<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\table\User;

/**
 * UserSearch represents the model behind the search form about `common\models\table\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'wid', 'pid', 'login_times', 'is_active'], 'integer'],
            [['name', 'password', 'nickname', 'portrait', 'last_login_time', 'last_login_ip', 'email', 'role', 'created_at', 'updated_at', 'auth_key', 'access_token', 'expire', 'menulist', 'rightlist', 'extdata'], 'safe'],
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
        $query = User::find();

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
            'login_times' => $this->login_times,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'portrait', $this->portrait])
            ->andFilterWhere(['like', 'last_login_time', $this->last_login_time])
            ->andFilterWhere(['like', 'last_login_ip', $this->last_login_ip])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'access_token', $this->access_token])
            ->andFilterWhere(['like', 'expire', $this->expire])
            ->andFilterWhere(['like', 'menulist', $this->menulist])
            ->andFilterWhere(['like', 'rightlist', $this->rightlist])
            ->andFilterWhere(['like', 'extdata', $this->extdata]);

        return $dataProvider;
    }
}
