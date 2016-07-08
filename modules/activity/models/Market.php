<?php

namespace app\modules\activity\models;

use Yii;

/**
 * This is the model class for table "{{%fahuo_market}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $nearby
 * @property integer $addtime
 * @property integer $areaid
 * @property integer $isjoin
 */
class Market extends \yii\db\ActiveRecord
{
    const MARKET_ZHENG_ZHOU = 3;
    const MARKET_CHENG_DU = 5;
    const MARKET_LIN_YI = 7;
    
    public static function tableName()
    {
        return '{{%fahuo_market}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addtime', 'areaid', 'isjoin'], 'required'],
            [['addtime', 'areaid', 'isjoin'], 'integer'],
            [['name', 'nearby'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'nearby' => 'Nearby',
            'addtime' => 'Addtime',
            'areaid' => 'Areaid',
            'isjoin' => 'Isjoin',
        ];
    }
}
