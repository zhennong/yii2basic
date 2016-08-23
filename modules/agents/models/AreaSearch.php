<?php

namespace app\modules\agents\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\agents\models\Area;

/**
 * AreaSearch represents the model behind the search form about `app\modules\agents\models\Area`.
 */
class AreaSearch extends Area
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['areaid', 'parentid', 'child', 'listorder'], 'integer'],
            [['areaname', 'arrparentid', 'arrchildid'], 'safe'],
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
        $query = Area::find();

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
            'areaid' => $this->areaid,
            'parentid' => $this->parentid,
            'child' => $this->child,
            'listorder' => $this->listorder,
        ]);

        $query->andFilterWhere(['like', 'areaname', $this->areaname])
            ->andFilterWhere(['like', 'arrparentid', $this->arrparentid])
            ->andFilterWhere(['like', 'arrchildid', $this->arrchildid]);

        return $dataProvider;
    }
}
