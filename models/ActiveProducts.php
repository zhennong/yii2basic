<?php

namespace app\models;

use app\components\Tools;
use app\modules\activity\models\ExcelTool;
use Yii;

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

    public static function getStatus()
    {
        return [
            self::STATUS_DEFAULT=>'默认',
            self::STATUS_HAS_MODIFY=>'已调价',
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

    /**
     * 获取活动产品id索引
     */
    public static function getActiveProductsIndex()
    {
        $active_id = ExcelTool::getActiveIdCache();
        $x = self::find()->select(['product_id'])->where(['active_id' => $active_id])->indexBy('product_id')->all();
        Yii::$app->cache->set('active_products_index', $x, 60);
        return $x;
    }
}
