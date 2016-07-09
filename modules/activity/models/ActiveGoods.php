<?php

namespace app\modules\activity\models;

use Yii;

/**
 * This is the model class for table "{{%active_goods}}".
 *
 * @property string $id
 * @property string $actid
 * @property integer $pid
 * @property integer $price
 * @property string $addtime
 * @property integer $marketprice
 * @property integer $marketid
 * @property integer $menshiid
 */
class ActiveGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%active_goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actid', 'pid', 'price', 'addtime'], 'required'],
            [['actid', 'pid', 'price', 'marketprice', 'marketid', 'menshiid'], 'integer'],
            [['addtime'], 'string', 'max' => 30],
            [['actid', 'pid'], 'unique', 'targetAttribute' => ['actid', 'pid'], 'message' => 'The combination of 活动id and 产品id has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'actid' => '活动id',
            'pid' => '产品id',
            'price' => '活动价',
            'addtime' => '添加时间',
            'marketprice' => '门市原价格',
            'marketid' => '农化市场ID',
            'menshiid' => '门市ID',
        ];
    }
}
