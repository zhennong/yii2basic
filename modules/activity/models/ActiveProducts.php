<?php

namespace app\modules\activity\models;

use yii\behaviors\TimestampBehavior;

class ActiveProducts extends \app\models\ActiveProducts
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static $staticActiveProducts = [
        ['active_id' => '25', 'product_id' => '95662', 'active_price' => '315', 'original_price' => '330', 'market_id' => '7', 'sales_id' => '0', 'market_original_price' => '300', 'market_active_price' => '285',],
        ['active_id' => '25', 'product_id' => '42407', 'active_price' => '900', 'original_price' => '1000', 'market_id' => '0', 'sales_id' => '0', 'market_original_price' => '0', 'market_active_price' => '0',],
    ];
}
