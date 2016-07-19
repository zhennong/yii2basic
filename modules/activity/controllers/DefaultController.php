<?php

namespace app\modules\activity\controllers;
use app\components\Tools;
use Yii;
use app\modules\activity\models\ActiveGoods;
use app\modules\activity\models\ActiveProducts;
use app\modules\activity\models\ExcelUploadForm;
use app\modules\activity\models\Market;
use app\modules\activity\models\Product;
use app\modules\activity\models\Sales;
use app\modules\activity\models\Supply;
use yii\web\UploadedFile;

/**
 * Default controller for the `activity` module
 */
class DefaultController extends ActivityController
{
    private  $staticActiveProducts;

    public function getStaticActiveProducts()
    {
        $staticActiveProducts = ActiveProducts::$staticActiveProducts;
        foreach($staticActiveProducts as $k => $v){
            $this_product_info = Product::find()->where(['itemid'=>$v['product_id']])->one();
            $staticActiveProducts[$k]['product_info'] = $this_product_info;
            if($v['market_id']>0){
                $this_supply_info = Supply::find()->where(['pid'=>$v['product_id']])->one();
                $this_sales_info = Sales::find()->where(['id'=>$this_supply_info['fid']])->one();
                $this_market_info = Market::find()->where(['id'=>$this_sales_info['marketid']])->one();
                $staticActiveProducts[$k]['supply_info'] = $this_supply_info;
                $staticActiveProducts[$k]['sales_info'] = $this_sales_info;
                $staticActiveProducts[$k]['market_info'] = $this_market_info;
            }
        }
        return $staticActiveProducts;
    }

    public function actionIndex()
    {
        $staticActiveProducts = $this->getStaticActiveProducts();
        return $this->render('index', [
            'staticActiveProducts' => $staticActiveProducts,
        ]);
    }

    /**
     * 导入活动产品
     */
    public function actionImportAcriveProducts()
    {
        $staticActiveProducts = $this->getStaticActiveProducts();
        $messages = [];
        $product_ids = [];
        foreach($staticActiveProducts as $k => $v){
            if(in_array($v['product_id'], $product_ids)){
                $messages[] = ['type'=>'danger', 'product_id'=>$v['product_id'], 'msg'=>'此产品重复'];
            }else{
                $this_product_info = Product::find()->where(['itemid'=>$v['product_id']])->one();
                if(!$this_product_info){
                    $messages[] = ['type'=>'danger', 'product_id'=>$v['product_id'], 'msg'=>'没有此产品'];
                }elseif($this_product_info['activeid']>0){
                    $messages[] = ['type'=>'danger', 'product_id'=>$v['product_id'], 'msg'=>'当前产品正在活动中'];
                }elseif($this_product_info['status']!=Product::STATUS_SHELVE){}elseif($this_product_info['price']==0){
                    $messages[] = ['type'=>'warning', 'product_id'=>$v['product_id'], 'msg'=>'当前产品并未上架'];
                }elseif($this_product_info['price']<$v['active_price']||$this_product_info['price']==$v['active_price']){
                    $messages[] = ['type'=>'danger', 'product_id'=>$v['product_id'], 'msg'=>'活动价格应该小于当前产品价格'];
                }elseif($this_product_info['price']!=$v['original_price']){
                    $messages[] = ['type'=>'warning', 'product_id'=>$v['product_id'], 'msg'=>'原价与当前产品价格不符'];
                }
                $product_ids[] = $v['product_id'];
            }
        }
        return $this->render('import-active-products', [
            'messages'=>$messages,
        ]);
    }

    /**
     * excel导入活动产品
     */
    public function actionExcelImportActiveProducts()
    {
        $model = new ExcelUploadForm();
        $excel_uploads_path = Yii::getAlias('@uploads/activity/excels');
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->validate()) {
                $model->file->saveAs($excel_uploads_path.'/' . date("Y-m-d"). '.' . time() . '.' . $model->file->extension);
            }
        }
        $files = [];
        if ($dir = dir($excel_uploads_path)){
            while ($file = $dir->read()) {
                if (!is_dir($excel_uploads_path . $file)&&$file!="."&&$file!="..") {
                    $file_path = $excel_uploads_path.'/'.$file;
                    $files[] = [
                        'file_name'=>$file,
                        'file_path'=>$file_path,
                        'file_size'=>filesize($file_path),
                    ];
                }
            }
        }
        return $this->render('excel-import-active-products', [
            'model'=>$model,
            'files'=>$files,
        ]);
    }

    /**
     * 删除活动产品excel
     * @param $file_path
     */
    public function actionDeleteExcelActiveProducts($file_path)
    {
        unlink($file_path);
        $this->redirect(['/activity/default/excel-import-active-products']);
    }

    /**
     * 展示活动产品excel
     * @param $file_path
     */
    public function actionShowExcelActiveProducts()
    {
        if(Yii::$app->request->isAjax) {
            $para = Yii::$app->request->post();
            $file_path = $para['file_path'];
            $excel_data = Tools::format_excel2array($file_path);
            $excel_header = array_keys($excel_data[0]);
            $excel_title = $excel_data[1];
            foreach ($excel_data as $k => $v){
                if($k>1){
                    $excel_body[] = $v;
                }
            }
            return $this->renderAjax('show-excel-active-products', [
                'excel_data'=>$excel_data,
                'excel_header'=>$excel_header,
                'excel_title'=>$excel_title,
                'excel_body'=>$excel_body,
            ]);
        }
    }

    public function actionModifyActiveProducts()
    {
        $staticActiveProducts = $this->getStaticActiveProducts();
        ActiveGoods::deleteAll();
        ActiveProducts::deleteAll();
        $ActiveGoods = new ActiveGoods();
        $ActvieProducts = new ActiveProducts();
        foreach($staticActiveProducts as $k => $v){
            // 插入到active goods表里
            $active_goods = clone $ActiveGoods;
            $active_goods->actid = $v['active_id'];
            $active_goods->pid = $v['product_id'];
            $active_goods->price = $v['active_price'];
            $active_goods->marketprice = $v['market_active_price'];
            $active_goods->marketid = $v['market_id'];
            $active_goods->menshiid = $v['market_id']>0?$v['sales_info']['id']:0;
            $active_goods->addtime = time();
            $active_goods->save();
            // 插入到active products表里
            $actvie_products = clone $ActvieProducts;
            $actvie_products->active_id = $v['active_id'];
            $actvie_products->product_id = $v['product_id'];
            $actvie_products->active_price = $v['active_price'];
            $actvie_products->original_price = $v['original_price'];
            $actvie_products->price_bak = $v['product_info']['price'];
            $actvie_products->market_id = $v['market_id'];
            $actvie_products->sales_id = $v['market_id']>0?$v['sales_info']['id']:0;
            $actvie_products->market_active_price = $v['market_active_price'];
            $actvie_products->market_original_price = $v['market_original_price'];
            $actvie_products->market_price_bak = $v['market_id']>0?$v['supply_info']['price']:0;
            $actvie_products->save();
        }
        $this->redirect(['/activity/active-products']);
    }
}
