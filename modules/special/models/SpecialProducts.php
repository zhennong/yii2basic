<?php

namespace app\modules\special\models;

use Yii;

/**
 * This is the model class for table "{{%special_products}}".
 *
 * @property integer $special_id
 * @property integer $product_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property double $price
 * @property double $price_bak
 */
class SpecialProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%special_products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['special_id', 'product_id'], 'required'],
            [['special_id', 'product_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['price', 'price_bak'], 'number'],
            [['special_id', 'product_id'], 'unique', 'targetAttribute' => ['special_id', 'product_id'], 'message' => 'The combination of 专题id and 产品id has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'special_id' => '专题id',
            'product_id' => '产品id',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'price' => '专题价格',
            'price_bak' => '产品价格备份',
        ];
    }
}
