<?php

namespace app\models\filters;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Goods;

/**
 * GoodsFilter represents the model behind the search form of `app\models\Goods`.
 */
class GoodsFilter extends Goods
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quantity', 'joint_purchase', 'show_on_main'], 'integer'],
            [['code', 'name', 'level1', 'level2', 'level3', 'property', 'measure', 'img', 'description'], 'safe'],
            [['price', 'priceSP'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Goods::find();

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
            'price' => $this->price,
            'priceSP' => $this->priceSP,
            'quantity' => $this->quantity,
            'joint_purchase' => $this->joint_purchase,
            'show_on_main' => $this->show_on_main,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'level1', $this->level1])
            ->andFilterWhere(['like', 'level2', $this->level2])
            ->andFilterWhere(['like', 'level3', $this->level3])
            ->andFilterWhere(['like', 'property', $this->property])
            ->andFilterWhere(['like', 'measure', $this->measure])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
