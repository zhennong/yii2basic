<?php

namespace app\modules\activity\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "destoon_active_products".
 *
 * @property integer $active_id
 * @property integer $product_id
 * @property integer $active_price
 * @property integer $original_price
 * @property integer $price_bak
 * @property integer $market_id
 * @property integer $sales_id
 * @property integer $market_original_price
 * @property integer $market_active_price
 * @property integer $market_price_bak
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class ActiveProducts extends \yii\db\ActiveRecord
{
    const STATUS_DEFAULT = 0;
    const STATUS_HAS_MODIFY = 1;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    public static function getStatus()
    {
        return [
            self::STATUS_DEFAULT=>'默认',
        ];
    }

    public static function tableName()
    {
        return 'destoon_active_products';
    }

    public function rules()
    {
        return [
            [['active_id', 'product_id', 'active_price', 'original_price', 'price_bak', 'market_id', 'sales_id', 'market_original_price', 'market_active_price', 'market_price_bak', 'created_at', 'updated_at', 'status'], 'integer'],
            [['product_id', 'active_price', 'original_price'], 'required'],
            [['product_id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'active_id' => '活动id',
            'product_id' => '产品id',
            'active_price' => '活动价',
            'original_price' => '原价',
            'price_bak' => '产品价格备份',
            'market_id' => '农化市场ID',
            'sales_id' => '门市ID',
            'market_original_price' => '门市原价格',
            'market_active_price' => '门市价格',
            'market_price_bak' => '门市价格备份',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    public static $staticActiveProducts = [
        ['active_id' => '25', 'product_id' => '95662', 'active_price' => '315', 'original_price' => '330', 'market_id' => '7', 'sales_id' => '0', 'market_original_price' => '300', 'market_active_price' => '285',],
        ['active_id' => '25', 'product_id' => '42407', 'active_price' => '900', 'original_price' => '1000', 'market_id' => '0', 'sales_id' => '0', 'market_original_price' => '0', 'market_active_price' => '0',],
    ];
}
