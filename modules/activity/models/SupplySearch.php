<?php

namespace app\modules\activity\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\activity\models\Supply;
use app\modules\activity\models\Active;

/**
 * SupplySearch represents the model behind the search form about `app\modules\activity\models\Supply`.
 */
class SupplySearch extends Supply
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fid', 'price', 'activeid', 'yuanprice', 'actprice', 'isfahuo', 'addtime', 'edittime', 'type', 'pid'], 'integer'],
            [['cj', 'product', 'standard', 'editor', 'username', 'yjarea', 'linkpid'], 'safe'],
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
        $query = Supply::find()->where(['activeid'=>Active::getLastActiveId()]);

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
            'fid' => $this->fid,
            'price' => $this->price,
            'activeid' => $this->activeid,
            'yuanprice' => $this->yuanprice,
            'actprice' => $this->actprice,
            'isfahuo' => $this->isfahuo,
            'addtime' => $this->addtime,
            'edittime' => $this->edittime,
            'type' => $this->type,
            'pid' => $this->pid,
        ]);

        $query->andFilterWhere(['like', 'cj', $this->cj])
            ->andFilterWhere(['like', 'product', $this->product])
            ->andFilterWhere(['like', 'standard', $this->standard])
            ->andFilterWhere(['like', 'editor', $this->editor])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'yjarea', $this->yjarea])
            ->andFilterWhere(['like', 'linkpid', $this->linkpid]);

        return $dataProvider;
    }
}
