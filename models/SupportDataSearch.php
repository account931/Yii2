<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SupportData;

/**
 * SupportDataSearch represents the model behind the search form about `app\models\SupportData`.
 */
class SupportDataSearch extends SupportData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sData_id', 'sData_category'], 'integer'],
            [['sData_user', 'sData_ip', 'sData_date', 'sData_header', 'sData_text'], 'safe'],
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
        $query = SupportData::find();

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
            'sData_id' => $this->sData_id,
            'sData_category' => $this->sData_category,
        ]);

        $query->andFilterWhere(['like', 'sData_user', $this->sData_user])
            ->andFilterWhere(['like', 'sData_ip', $this->sData_ip])
            ->andFilterWhere(['like', 'sData_date', $this->sData_date])
            ->andFilterWhere(['like', 'sData_header', $this->sData_header])
            ->andFilterWhere(['like', 'sData_text', $this->sData_text]);

        return $dataProvider;
    }
}
