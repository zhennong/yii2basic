<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%area_agent_assign}}".
 *
 * @property string $id
 * @property integer $manage_id
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
    /**
     * @inheritdoc
     */
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
            [['manage_id', 'area_id'], 'required'],
            [['manage_id', 'area_id', 'fasten'], 'integer'],
            [['area_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manage_id' => '后台管理员userid',
            'area_id' => '地区id',
            'fasten' => '是否固定',
        ];
    }
}
