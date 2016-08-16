<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 11:10
 */

namespace app\modules\activity\models;

use app\models\Products;
use app\models\Supply;
use Yii;
use app\components\Tools;
use yii\db\Exception;
use app\modules\activity\models\Active;

class ExcelTool
{
    /**
     * 把活动产品excel主要信息A-G转list数组
     * @return list
     */
    public static function changeExcelToListForActiveProducts($file_path)
    {
        $excel_data = Tools::format_excel2array($file_path);
        foreach ($excel_data as $k => $v) {
            if ($k > 1) {
                $excel_body[] = $v;
            }
        }
        foreach ($excel_body as $k => $v) {
            if ($v['A'] > 0 && $v['B'] > 0) {
                $active_id = $v['A'];
                $product_id = $v['B'];
                $active_price = $v['C'];
                $original_price = $v['D'];
                $market_id = $v['E'];
                $market_active_price = $v['F'];
                $market_original_price = $v['G'];
                $list[$k]['active_id'] = $active_id;
                $list[$k]['product_id'] = $product_id;
                $list[$k]['active_price'] = $active_price;
                $list[$k]['original_price'] = $original_price;
                $list[$k]['market_id'] = $market_id;
                $list[$k]['sales_id'] = Sales::getSalesIdFromProductIdAndMarketId($product_id, $market_id);
                $list[$k]['market_active_price'] = $market_active_price;
                $list[$k]['market_original_price'] = $market_original_price;
            }
        }
        return $list;
    }

    /**
     * 检测excel数据
     */
    public static function checkExcelActiveProducts($list)
    {
        $product_ids = [];
        $messages = [];
        $active_id = Active::getLastActiveId();
        foreach ($list as $k => $v) {
            if (in_array($v['product_id'], $product_ids)) {
                $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '此产品重复'];
            } else {
                $this_product_info = Product::find()->select(['activeid', 'status', 'price'])->where(['itemid' => $v['product_id']])->one();
                $find_active_products = ActiveProducts::find()->select(['product_id'])->where(['product_id' => $v['product_id'], 'active_id' => $active_id])->one();
                if ($v['active_id'] != $active_id) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '活动id不正确'];
                } elseif (!$this_product_info) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '没有此产品'];
                } elseif (count($find_active_products) > 0) {
                    $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '已存在此产品'];
                } elseif ($this_product_info['activeid'] > 0) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '当前产品正在活动中'];
                } elseif ($this_product_info['status'] != Product::STATUS_SHELVE) {
                } elseif ($this_product_info['price'] == 0) {
                    $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '当前产品并未上架'];
                } elseif ($this_product_info['price'] < $v['active_price'] || $this_product_info['price'] == $v['active_price']) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '活动价格应该小于当前产品价格'];
                } elseif ($this_product_info['price'] != $v['original_price']) {
                    $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '原价与当前产品价格不符'];
                } else {
                    if ($v['market_id'] > 0) {
                        $sales_id = Sales::getSalesIdFromProductIdAndMarketId($v['product_id'], $v['market_id']);
                        if (!$sales_id) {
                            $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '没有门市'];
                        } else {
                            $sales_price = $sales_id > 0 ? Supply::find()->select(['price'])->where(['pid' => $v['product_id'], 'fid' => $sales_id])->one()->price : 0;
                            if ($sales_price != $v['market_original_price']) {
                                $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '门市原价不符'];
                            } elseif ($sales_price < $v['market_active_price']) {
                                $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '门市活动底价比原底价高'];
                            }
                        }
                    }
                }
                $product_ids[] = $v['product_id'];
            }
        }
        return $messages;
    }
    public static function checkExcelActiveProducts1($list)
    {
        $product_ids = [];
        $messages = [];
        $active_id = Active::getLastActiveId();
        $products = Products::find()->select(['itemid', 'activeid', 'status', 'price'])->indexBy('itemid')->asArray()->all();
        $active_products = ActiveProducts::find()->select(['product_id'])->where(['active_id' => $active_id])->indexBy('product_id')->asArray()->all();
//        $supplies = Supply::find()->select(['fid', 'price'])->indexBy('fid')->asArray()->all();
        $sales_ids_arr = Supply::getSalesIdsArr();
        $sales_price_arr = Supply::getSalesPriceArr();
        foreach($list as $k => $v){
            $product_id = $v['product_id'];
            if (in_array($product_id, $product_ids)) {
                $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '此产品重复'];
            } else {
                $product_info = isset($products[$product_id])?$products[$product_id]:false;
                Tools::_vp($product_info,0,2);
                if ($v['active_id'] != $active_id) {
                    $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '活动id不正确'];
                } elseif (!$product_info) {
                    $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '没有此产品'];
                } elseif (isset($active_products[$product_id])) {
                    $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '已存在此产品'];
                } elseif ($product_info['activeid'] > 0) {
                    $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '当前产品正在活动中'];
                } elseif ($product_info['status'] != Product::STATUS_SHELVE) {
                } elseif ($product_info['price'] == 0) {
                    $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '当前产品并未上架'];
                } elseif ($product_info['price'] < $v['active_price'] || $product_info['price'] == $v['active_price']) {
                    $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '活动价格应该小于当前产品价格'];
                } elseif ($product_info['price'] != $v['original_price']) {
                    $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '原价与当前产品价格不符'];
                } else {
                    if ($v['market_id'] > 0) {
                        $sales_id = Sales::getSalesIdFromProductIdAndMarketId1($sales_ids_arr, $product_id, $v['market_id']);
                        if (!$sales_id) {
                            $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '没有门市'];
                        } else {
                            $sales_price = $sales_id > 0 ? Supply::find()->select(['price'])->where(['pid' => $product_id, 'fid' => $sales_id])->one()->price : 0;
                            if ($sales_price != $v['market_original_price']) {
                                $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '门市原价不符'];
                            } elseif ($sales_price < $v['market_active_price']) {
                                $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '门市活动底价比原底价高'];
                            }
                        }
                    }
                }
                $product_ids[] = $product_id;
            }
        }
        return $messages;
    }

    /**
     * 由list插入数据到数据库
     */
    public static function importListlActiveProductsToDatabase($data)
    {
        $ActiveGoods = new ActiveGoods();
        $ActvieProducts = new ActiveProducts();
        /*ActiveGoods::deleteAll(['actid' => $active_id]);
        ActiveProducts::deleteAll(['active_id' => $active_id]);*/
        $status = 1;
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($data as $k => $v) {
                $active_id = $v['active_id'];
                $product_id = $v['product_id'];
                $active_price = $v['active_price'];
                $original_price = $v['original_price'];
                $market_id = $v['market_id'];
                $market_active_price = $v['market_active_price'];
                $market_original_price = $v['market_original_price'];
                $sales_id = $v['sales_id'];
                $sales_price = $sales_id > 0 ? Supply::findOne(['pid' => $product_id, 'fid' => $sales_id])->price : 0;
                $product_info = Product::findOne(['itemid' => $product_id]);
                // 插入到active goods表里
                $active_goods = clone $ActiveGoods;
                $active_goods->actid = $active_id;
                $active_goods->pid = $product_id;
                $active_goods->price = $active_price;
                $active_goods->marketprice = $market_active_price;
                $active_goods->marketid = $market_id;
                $active_goods->menshiid = $sales_id;
                $active_goods->addtime = time();
                $active_goods->save();
                // 插入到active products表里
                $active_products = clone $ActvieProducts;
                $active_products->active_id = $active_id;
                $active_products->product_id = $product_id;
                $active_products->active_price = $active_price;
                $active_products->original_price = $original_price;
                $active_products->price_bak = $product_info['price'];
                $active_products->market_id = $market_id;
                $active_products->sales_id = $market_id > 0 ? $sales_id : 0;
                $active_products->market_active_price = $market_active_price;
                $active_products->market_original_price = $market_original_price;
                $active_products->market_price_bak = $sales_price;
                $active_products->save();
            }
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
            $status = 0;
        }
        return $status;
    }
}