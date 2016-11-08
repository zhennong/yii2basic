<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 11:10
 */

namespace app\modules\activity\models;

use app\models\ActiveProducts;
use app\models\Products;
use app\models\Sales;
use app\models\Supply;
use Yii;
use app\components\Tools;
use yii\db\Exception;

class ExcelTool
{
    /**
     * 获取活动id缓存
     * @return mixed
     */
    public static function getActiveIdCache()
    {
        Yii::$app->cache->flush(); //清楚缓存

        $x = Yii::$app->cache->get('active_id');
        if ($x){
//            Tools::_vp('get active_id',0,3);
        }else{
//            Tools::_vp('set active_id',0,3);
            $x = Active::getLastActiveId();
            Yii::$app->cache->set('active_id', $x, 86400);
        }
        return $x;
    }

    /**
     * 获取产品缓存
     * @return array|mixed|\yii\db\ActiveRecord[]
     */
    public static function getProductsCache()
    {
        $products = Yii::$app->cache->get('products_index_by_itemid');
        if ($products){
//            Tools::_vp('get products_index_by_itemid',0,3);
        }else{
//            Tools::_vp('set products_index_by_itemid',0,3);
            $products = Products::find()->select(['itemid', 'activeid', 'status', 'price'])->indexBy('itemid')->asArray()->all();
            Yii::$app->cache->set('products_index_by_itemid', $products, 60);
        }
        return $products;
    }

    /**
     * 获取活动产品缓存
     */
    public static function getActiveProductsCache()
    {
        $x = Yii::$app->cache->get('active_products_index');
        if ($x){
//            Tools::_vp('get active_products_index',0,3);//
        }else{
//            Tools::_vp('set active_products_index',0,3);//
            $x = ActiveProducts::getActiveProductsIndex();
            Yii::$app->cache->set('active_products_index', $x, 60);
        }
        return $x;
    }

    /**
     * 获取门市信息的market product 索引缓存
     */
    public static function getAllSalesCache()
    {
        $x = Yii::$app->cache->get('all_sales');
        if ($x){
//            Tools::_vp('get all_sales',0,3);
        }else{
//            Tools::_vp('set all_sales',0,3);
            $x = Sales::getAllSalesDetailFromMarketAndProduct();
            Yii::$app->cache->set('all_sales', $x, 60);
        }
        return $x;
    }

    /**
     * 获取所有的供应信息缓存
     */
    public static function getAllSupplyDetail()
    {
        $x = Yii::$app->cache->get('all_supply');
        if($x){
//            Tools::_vp('get all_supply',0,3);
        }else{
//            Tools::_vp('set all_supply',0,3);
            $x = Supply::getAllSupplyDetail();
            Yii::$app->cache->set('all_supply', $x, 60);
        }
        return $x;
    }

    /**
     * 把活动产品excel主要信息A-G转list数组并缓存
     * @return list
     */
    public static function getExcelActiveProducts($file_path)
    {
        $list = [];
        $excel_data = Tools::format_excel2array($file_path);
        foreach ($excel_data as $k => $v) {
            if ($k > 1) {
                $excel_body[] = $v;
            }
        }
        foreach ($excel_body as $k => $v) {
            if ($v['A'] > 0 && $v['B'] > 0) {
                $active_id = str_replace(' ', '', $v['A']);
                $product_id = str_replace(' ', '', str_replace('=', '', $v['B']));
                $active_price = str_replace(' ', '', $v['C']);
                $original_price = str_replace(' ', '', $v['D']);
                $market_id = str_replace(' ', '', $v['E']);
                $market_active_price = str_replace(' ', '', $v['F']);
                $market_original_price = str_replace(' ', '', $v['G']);
                $list[$k]['active_id'] = $active_id;
                $list[$k]['product_id'] = $product_id;
                $list[$k]['active_price'] = $active_price;
                $list[$k]['original_price'] = $original_price;
                $list[$k]['market_id'] = $market_id;
                $sales_info = Sales::getSalesDetailByMarketIdAndProductId($product_id, $market_id);
                $list[$k]['sales_id'] = $sales_info['sales_id'];
                $list[$k]['market_active_price'] = $market_active_price;
                $list[$k]['market_original_price'] = $market_original_price;
            }
        }
        return $list;
    }

    public static function changeExcelToListForActiveProducts($file_path)
    {
        $k = 'excel_list_file_path_'.md5($file_path);
        $x = Yii::$app->cache->get($k);
        if($x){
//            Tools::_vp('get '.$k,0,3);
        }else{
//            Tools::_vp('set '.$k,0,3);
            $x = self::getExcelActiveProducts($file_path);
            Yii::$app->cache->set($k, $x, 86400);
        }
        return $x;
    }

    /**
     * 检测excel数据
     */
    public static function checkExcelActiveProducts($list)
    {
        $product_ids = [];
        $messages = [];
        $products = self::getProductsCache();
        $active_id = self::getActiveIdCache();
        Yii::$app->cache->flush();
        $active_products = self::getActiveProductsCache();

        foreach($list as $k => $v){
            $product_id = $v['product_id'];
            if (in_array($product_id, $product_ids)) {
                $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '此产品重复'];
            } else {
                $product_info = isset($products[$product_id])?$products[$product_id]:false;
                if ($v['active_id'] != $active_id) {
                    $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '活动id不正确'];
                } elseif (!$product_info) {
                    $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '没有此产品'];
                } elseif (isset($active_products[$product_id])) {
//                    $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '已存在此产品'];
                } elseif ($product_info['activeid'] > 0) {
                    $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '当前产品正在活动中'];
                }
//                elseif ($product_info['status'] != Product::STATUS_SHELVE) {
//                    $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '当前产品未上架'];
//                }
                elseif ($product_info['price'] == 0) {
                    $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '当前产品并未上架'];
                }
//                elseif ($product_info['price'] < $v['active_price'] || $product_info['price'] == $v['active_price']) {
//                    $messages[] = ['type' => 'danger', 'product_id' => $product_id, 'msg' => '活动价格应该小于当前产品价格'];
//                }
//                elseif ($product_info['price'] != $v['original_price']) {
//                    $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '原价与当前产品价格不符'];
//                }
                else {
                    if ($v['market_id'] > 0) {
                        $market = $v['market_id'];
                        $sales_info = Sales::getSalesDetailByMarketIdAndProductId($market, $product_id);
                        $sales_id = isset($sales_info)?$sales_info['sales_id']:false;
                        $sales_price = isset($sales_info)?$sales_info['price']:false;
                        if (!$sales_id) {
                            $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '没有门市'];
                        }
//                        else {
//                            if ($sales_price != $v['market_original_price']) {
//                                var_dump($sales_price ."<-->".$v['market_original_price']);
//                                $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '门市原价不符'];
//                            }
//                            elseif ($sales_price < $v['market_active_price']) {
//                                $messages[] = ['type' => 'warning', 'product_id' => $product_id, 'msg' => '门市活动底价比原底价高'];
//                            }
//                        }
                    }
                }

                $product_ids[] = $product_id;
            }
        }
        return $messages;
    }

    /**
     * 获取已存在的活动产品
     */
    public static function getExistProductIds($list)
    {
        $ids = [];
        $active_products = self::getActiveProductsCache();
        foreach($list as $k => $v) {
            $product_id = $v['product_id'];
            if (isset($active_products[$product_id])){
                $ids[] = $product_id;
            }
        }
        return $ids;
    }

    /**
     * 由list插入数据到数据库
     */
    public static function importListActiveProductsToDatabase($data)
    {
        $ActiveGoods = new ActiveGoods();
        $ActvieProducts = new ActiveProducts();
        $status = 1;
        $products = ExcelTool::getProductsCache();
        $exist_active_product_ids = self::getExistProductIds($data);
        $transaction = Yii::$app->db->beginTransaction();
        try {

            foreach ($data as $k => $v) {
                $product_id = $v['product_id'];
                if(!in_array($product_id, $exist_active_product_ids)){
                    $active_id = $v['active_id'];
                    $active_price = $v['active_price'];
                    $original_price = $v['original_price'];
                    $market_id = $v['market_id'];
                    $market_active_price = $v['market_active_price'];
                    $market_original_price = $v['market_original_price'];
                    $sales_info = Sales::getSalesDetailByMarketIdAndProductId($market_id, $product_id);
//                $sales_id = $v['sales_id'];
                    $sales_id = $sales_info['sales_id'];
                    $sales_price = isset($sales_info['price']) ? $sales_info['price'] : 0;
                    $product_info = $products[$product_id];
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
            }

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
            $status = 0;
        }
        return $status;
    }
    public static function importListActiveProductsToDatabase1($data)
    {
        $status = 1;
        $products = ExcelTool::getProductsCache();
        foreach ($data as $k => $v) {
            $active_id = $v['active_id'];
            $product_id = $v['product_id'];
            $active_price = $v['active_price'];
            $original_price = $v['original_price'];
            $market_id = $v['market_id'];
            $market_active_price = $v['market_active_price'];
            $market_original_price = $v['market_original_price'];
            $sales_info = $market_id>0&&Sales::getSalesDetailByMarketIdAndProductId($market_id, $product_id);
            $sales_id = isset($sales_info['sales_id'])?$sales_info['sales_id']:0;
            $sales_price = isset($sales_info['price']) ? $sales_info['price'] : 0;
            $product_info = $products[$product_id];
            // 插入到active goods数据
            $active_goods[] = [$active_id, $product_id, $active_price, time(), $market_active_price, $market_id, $sales_id];
            // 插入到active products数据
            $active_products[] = [$active_id, $product_id, $active_price, $original_price, $product_info['price'], $market_id, $market_active_price, $market_original_price, $sales_price];
        }
        $transaction = Yii::$app->db->beginTransaction();
        try {
            Yii::$app->db->createCommand()->batchInsert(ActiveGoods::tableName(), ['actid', 'pid', 'price', 'addtime', 'market_price', 'marketid', 'menshiid'], $active_goods)->execute();
            Yii::$app->db->createCommand()->batchInsert(ActiveProducts::tableName(), ['active_id', 'product_id', 'active_price', 'original_price', 'price_bak', 'market_id', 'sales_id', 'market_active_price', 'market_original_price', 'market_price_bak'], $active_products)->execute();
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
            $status = 0;
        }
        return $status;
    }
}