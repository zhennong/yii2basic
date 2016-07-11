<?php

namespace app\modules\activity\controllers;
use app\modules\activity\models\ActiveProducts;
use app\modules\activity\models\Market;
use app\modules\activity\models\Product;
use app\modules\activity\models\Sales;
use app\modules\activity\models\Supply;

/**
 * Default controller for the `activity` module
 */
class DefaultController extends ActivityController
{
    public function actionIndex()
    {
        $staticActiveProducts = ActiveProducts::$staticActiveProducts;
        foreach($staticActiveProducts as $k => $v){
            $this_product_info = Product::find()->where(['itemid'=>$v['product_id']])->one();
            $staticActiveProducts[$k]['product_info'] = $this_product_info;
            if($v['market_id']>0){
                $this_supply_info = Supply::find()->where(['pid'=>$v['product_id']])->one();
                $this_sales_info = Sales::find()->where(['id'=>$this_supply_info['fid']])->one();
                $this_market_info = Market::find()->where(['id'=>$this_sales_info['marketid']])->one();
                $staticActiveProducts[$k]['sales_info'] = $this_sales_info;
                $staticActiveProducts[$k]['market_info'] = $this_market_info;
            }
        }
        return $this->render('index', [
            'staticActiveProducts' => $staticActiveProducts,
        ]);
    }

    /**
     * 导入活动产品
     */
    public function actionImportAcriveProducts()
    {
        $staticActiveProducts = ActiveProducts::$staticActiveProducts;
        $messages = [];
        $message_error_total = 0;
        $product_ids = [];
        foreach($staticActiveProducts as $k => $v){
            if(in_array($v['product_id'], $product_ids)){
                $messages[] = ['type'=>'danger', 'product_id'=>$v['product_id'], 'msg'=>'此产品重复'];
                $message_error_total++;
            }else{
                $this_product_info = Product::find()->where(['itemid'=>$v['product_id']])->one();
                if(!$this_product_info){
                    $messages[] = ['type'=>'danger', 'product_id'=>$v['product_id'], 'msg'=>'没有此产品'];
                    $message_error_total++;
                }
                if($this_product_info['price']<$v['active_price']||$this_product_info['price']==$v['active_price']){
                    $messages[] = ['type'=>'danger', 'product_id'=>$v['product_id'], 'msg'=>'活动价格应该小于当前产品价格'];
                    $message_error_total++;
                }
                if($this_product_info['price']!=$v['original_price']){
                    $messages[] = ['type'=>'warning', 'product_id'=>$v['product_id'], 'msg'=>'原价与当前产品价格不符'];
                }
                $product_ids[] = $v['product_id'];
            }
        }
        return $this->render('import-acrive-products', [
            'messages'=>$messages,
        ]);
    }

    public function setMsg()
    {
        #
    }
}
