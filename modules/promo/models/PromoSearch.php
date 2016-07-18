<?php

namespace app\modules\promo\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\promo\models\Promo;

/**
 * PromoSearch represents the model behind the search form about `app\modules\promo\models\Promo`.
 */
class PromoSearch extends Promo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid', 'type', 'reuse', 'addtime', 'totime', 'updatetime', 'special_type'], 'integer'],
            [['number', 'editor', 'username', 'ip'], 'safe'],
            [['amount'], 'number'],
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
        $query = Promo::find();

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
            'itemid' => $this->itemid,
            'type' => $this->type,
            'amount' => $this->amount,
            'reuse' => $this->reuse,
            'addtime' => $this->addtime,
            'totime' => $this->totime,
            'updatetime' => $this->updatetime,
            'special_type' => $this->special_type,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'editor', $this->editor])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}
