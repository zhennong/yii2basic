<?php

namespace app\modules\agents\models;

use app\models\Area;
use app\models\Members;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AreaManageAssignSearch represents the model behind the search form about `app\modules\agents\models\AreaManageAssign`.
 */
class AreaManageAssignSearch extends AreaManageAssign
{

    public function rules()
    {
        return [
            [['manager_id', 'area_id', 'fasten'], 'integer'],
            [['area_name', 'manager', 'manager_name'], 'string'],
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
        $query = AreaManageAssign::find()->joinWith(['area', 'members'])->select([
            self::tableName().".*",
            Area::tableName().".areaname AS area_name",
            Members::tableName().".username AS manager",
            Members::tableName().".truename AS manager_name",
        ])->where([Area::tableName().'.child'=>Area::NO_CHILD]);

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
            'area_id' => $this->area_id,
            Area::tableName().".areaname" => $this->area_name,
            'manager_id' => $this->manager_id,
            Members::tableName().".username" => $this->manager,
            Members::tableName().".truename" => $this->manager_name,
            'fasten' => $this->fasten,
        ]);

        return $dataProvider;
    }
}
