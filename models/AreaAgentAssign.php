<?php

namespace app\models;

use app\modules\agents\models\Depart;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%area_agent_assign}}".
 *
 * @property integer $manager_id
 * @property integer $area_id
 * @property integer $fasten
 */
class AreaAgentAssign extends \yii\db\ActiveRecord
{
    const FASTEN_DEFAULT = 0;
    const FASTEN_STABLE = 1;

    public static function getFasten()
    {
        return [
            self::FASTEN_DEFAULT=>'默认',
            self::FASTEN_STABLE=>'固定',
        ];
    }

    public static function getManagers()
    {
        $managers = Depart::getInvestmentManagers();
        $x = [];
        foreach($managers as $k => $v){
            $x[$v['username']] = $v['username'];
        }
        return $x;
    }

    public static function getManagerNames()
    {
        $managers = Depart::getInvestmentManagers();
        $x = [];
        foreach($managers as $k => $v){
            $x[$v['truename']] = $v['truename'];
        }
        return $x;
    }

    public static function getManagerIds()
    {
        $managers = Depart::getInvestmentManagers();
        $x = [];
        foreach($managers as $k => $v){
            $x[$v['userid']] = $v['userid'];
        }
        return $x;
    }

    public static function getManagerIdToName()
    {
        $managers = Depart::getInvestmentManagers();
        $x = [];
        foreach($managers as $k => $v){
            $x[$v['userid']] = $v['userid']."|".$v['username']."|".$v['truename'];
        }
        return $x;
    }

    public static function getAreaIdToName()
    {
        return ArrayHelper::map(Area::find()->select(['areaid', 'areaname'])->where(['child'=>Area::NO_CHILD])->asArray()->all(), 'areaid', 'areaname');
    }

    public static function tableName()
    {
        return '{{%area_agent_assign}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manager_id', 'area_id'], 'required'],
            [['manager_id', 'area_id', 'fasten'], 'integer'],
            [['area_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'area_id' => '地区id',
            'manager_id' => '后台管理员userid',
            'fasten' => '是否固定',
        ];
    }
}
