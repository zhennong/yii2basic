<?php

namespace app\modules\activity\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\activity\models\ActiveProducts;

/**
 * ActiveProductsSearch represents the model behind the search form about `app\modules\activity\models\ActiveProducts`.
 */
class ActiveProductsSearch extends ActiveProducts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active_id', 'product_id', 'active_price', 'original_price', 'price_bak', 'market_id', 'sales_id', 'market_original_price', 'market_active_price', 'market_price_bak', 'created_at', 'updated_at', 'status'], 'integer'],
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
        $query = ActiveProducts::find();

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
            'active_id' => $this->active_id,
            'product_id' => $this->product_id,
            'active_price' => $this->active_price,
            'original_price' => $this->original_price,
            'price_bak' => $this->price_bak,
            'market_id' => $this->market_id,
            'sales_id' => $this->sales_id,
            'market_original_price' => $this->market_original_price,
            'market_active_price' => $this->market_active_price,
            'market_price_bak' => $this->market_price_bak,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
