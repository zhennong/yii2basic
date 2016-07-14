<?php

namespace app\modules\special\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\special\models\SpecialProducts;

/**
 * SpecialProductsSearch represents the model behind the search form about `app\modules\special\models\SpecialProducts`.
 */
class SpecialProductsSearch extends SpecialProducts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['special_id', 'product_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['price', 'price_bak'], 'number'],
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
        $query = SpecialProducts::find();

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
            'special_id' => $this->special_id,
            'product_id' => $this->product_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'price' => $this->price,
            'price_bak' => $this->price_bak,
        ]);

        return $dataProvider;
    }
}
