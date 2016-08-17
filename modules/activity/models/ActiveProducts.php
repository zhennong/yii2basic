<?php

namespace app\modules\activity\models;

use Yii;
use yii\behaviors\TimestampBehavior;

class ActiveProducts extends \app\models\ActiveProducts
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $active_goods = ActiveGoods::findOne(['pid'=>$this->product_id]);
            $active_goods->actid = $this->active_id;
            $active_goods->price = $this->active_price;
            $active_goods->marketprice = $this->market_active_price;
            $active_goods->marketid = $this->market_id;
            $active_goods->menshiid = $this->sales_id;
            if($active_goods->save()){
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    public static $staticActiveProducts = [
        ['active_id' => '25', 'product_id' => '95662', 'active_price' => '315', 'original_price' => '330', 'market_id' => '7', 'sales_id' => '0', 'market_original_price' => '300', 'market_active_price' => '285',],
        ['active_id' => '25', 'product_id' => '42407', 'active_price' => '900', 'original_price' => '1000', 'market_id' => '0', 'sales_id' => '0', 'market_original_price' => '0', 'market_active_price' => '0',],
    ];

    public static function getStaticActiveProducts()
    {
        $staticActiveProducts = self::$staticActiveProducts;
        foreach ($staticActiveProducts as $k => $v) {
            $this_product_info = Product::find()->where(['itemid' => $v['product_id']])->one();
            $staticActiveProducts[$k]['product_info'] = $this_product_info;
            if ($v['market_id'] > 0) {
                $this_supply_info = Supply::find()->where(['pid' => $v['product_id']])->one();
                $this_sales_info = Sales::find()->where(['id' => $this_supply_info['fid']])->one();
                $this_market_info = Market::find()->where(['id' => $this_sales_info['marketid']])->one();
                $staticActiveProducts[$k]['supply_info'] = $this_supply_info;
                $staticActiveProducts[$k]['sales_info'] = $this_sales_info;
                $staticActiveProducts[$k]['market_info'] = $this_market_info;
            }
        }
        return $staticActiveProducts;
    }

    /**
     * 活动调价
     */
    public static function modifyActivePrice($list = [])
    {
        $active_products = count($list) > 0 ? $list : self::find()->where(['active_id' => Active::getLastActiveId()])->all();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($active_products as $k => $v) {
                self::updateAll(['status' => self::STATUS_HAS_MODIFY], ['product_id' => $v['product_id']]);
                Product::updateAll([
                    'activeid' => $v['active_id'],
                    'price' => $v['active_price'],
                    'yuanprice' => $v['original_price'],
                ], ['itemid' => $v['product_id']]);
            }
            $transaction->commit();
            $status = 1;
        } catch (Exception $e) {
            $transaction->rollBack();
            $status = 0;
        }
        return $status;
    }

    /**
     * 活动价格恢复
     */
    public static function recoveryPrice($list = [])
    {
        $active_products = count($list) > 0 ? $list : self::find()->where(['active_id' => Active::getLastActiveId()])->all();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($active_products as $k => $v) {
                self::updateAll(['status' => self::STATUS_DEFAULT], ['product_id' => $v['product_id']]);
                Product::updateAll([
                    'activeid' => 0,
                    'price' => $v['original_price'],
                    'yuanprice' => 0,
                ], ['itemid' => $v['product_id']]);
            }
            $transaction->commit();
            $status = 1;
        } catch (Exception $e) {
            $transaction->rollBack();
            $status = 0;
        }
        return $status;
    }

    /**
     * 活动门市调价
     */
    public static function modifySalesActivePrice($list = [])
    {
        $active_products = count($list) > 0 ? $list : self::find()->where(['>', 'market_id', '0'])->all();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($active_products as $k => $v) {
                Supply::updateAll(['activeid' => Active::getLastActiveId(), 'price' => $v['market_active_price'], 'yuanprice' => $v['market_original_price'],], ['pid' => $v['product_id'], 'fid' => $v['sales_id']]);
            }
            $transaction->commit();
            $status = 1;
        } catch (Exception $e) {
            $transaction->rollBack();
            $status = 0;
        }
        return $status;
    }

    /**
     * 活动门市价格恢复
     */
    public static function recoverySalesPrice($list = [])
    {
        $active_products = count($list) > 0 ? $list : self::find()->where(['>', 'market_id', '0'])->all();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($active_products as $k => $v) {
                Supply::updateAll(['activeid' => 0, 'price' => $v['market_original_price'], 'yuanprice' => 0,], ['pid' => $v['product_id'], 'fid' => $v['sales_id']]);
            }
            $transaction->commit();
            $status = 1;
        } catch (Exception $e) {
            $transaction->rollBack();
            $status = 0;
        }
        return $status;
    }
}
