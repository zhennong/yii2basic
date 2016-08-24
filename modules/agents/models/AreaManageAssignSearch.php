<?php

namespace app\modules\agents\models;

use app\models\Area;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\agents\models\AreaManageAssign;

/**
 * AreaManageAssignSearch represents the model behind the search form about `app\modules\agents\models\AreaManageAssign`.
 */
class AreaManageAssignSearch extends AreaManageAssign
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manager_id', 'area_id', 'fasten'], 'integer'],
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
        $query = AreaManageAssign::find()->joinWith('area')->select([
            self::tableName().".*",
            Area::tableName().".areaname AS area_name",
        ]);

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
            'manager_id' => $this->manager_id,
            'area_id' => $this->area_id,
            'fasten' => $this->fasten,
        ]);

        return $dataProvider;
    }
}
