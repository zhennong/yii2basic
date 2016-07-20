<?php

namespace app\modules\activity\controllers;

use app\components\Tools;
use app\modules\activity\Module;
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
    private $staticActiveProducts;

    public function getStaticActiveProducts()
    {
        $staticActiveProducts = ActiveProducts::$staticActiveProducts;
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
        foreach ($staticActiveProducts as $k => $v) {
            if (in_array($v['product_id'], $product_ids)) {
                $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '此产品重复'];
            } else {
                $this_product_info = Product::find()->where(['itemid' => $v['product_id']])->one();
                if (!$this_product_info) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '没有此产品'];
                } elseif ($this_product_info['activeid'] > 0) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '当前产品正在活动中'];
                } elseif ($this_product_info['status'] != Product::STATUS_SHELVE) {
                } elseif ($this_product_info['price'] == 0) {
                    $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '当前产品并未上架'];
                } elseif ($this_product_info['price'] < $v['active_price'] || $this_product_info['price'] == $v['active_price']) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '活动价格应该小于当前产品价格'];
                } elseif ($this_product_info['price'] != $v['original_price']) {
                    $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '原价与当前产品价格不符'];
                }
                $product_ids[] = $v['product_id'];
            }
        }
        return $this->render('import-active-products', [
            'messages' => $messages,
        ]);
    }

    /**
     * 上传excel活动产品
     */
    public function actionExcelImportActiveProducts()
    {
        $model = new ExcelUploadForm();
        $excel_uploads_path = Yii::getAlias('@uploads/activity/excels');
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
                $saveAs = ($excel_uploads_path . '/' . date("Y-m-d") . '.' . time() . '.' . $model->file->extension);
                $is_save = $model->file->saveAs($saveAs);
                if($is_save){
                    $messages = $this->actionCheckExcelActiveProducts($saveAs);
                    if(count($messages)>0){
                        unlink($saveAs);
                        $messages_render = $this->renderPartial('import-active-products', [
                            'messages' => $messages,
                        ]);
                        Yii::$app->session->setFlash('error', $messages_render);
                    }else{
                        Yii::$app->session->setFlash('success', '导入成功');
                    }
                }
            }
        }
        $files = [];
        if ($dir = dir($excel_uploads_path)) {
            while ($file = $dir->read()) {
                if (!is_dir($excel_uploads_path . $file) && $file != "." && $file != "..") {
                    $file_path = $excel_uploads_path . '/' . $file;
                    $files[] = [
                        'file_name' => $file,
                        'file_path' => $file_path,
                        'file_size' => filesize($file_path),
                    ];
                }
            }
        }
        return $this->render('excel-import-active-products', [
            'model' => $model,
            'files' => $files,
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
        if (Yii::$app->request->isAjax) {
            $para = Yii::$app->request->post();
            $file_path = $para['file_path'];
            $excel_data = Tools::format_excel2array($file_path);
            $excel_header = array_keys($excel_data[0]);
            $excel_title = $excel_data[1];
            foreach ($excel_data as $k => $v) {
                if ($k > 1) {
                    $excel_body[] = $v;
                }
            }
            return $this->renderAjax('show-excel-active-products', [
                'excel_data' => $excel_data,
                'excel_header' => $excel_header,
                'excel_title' => $excel_title,
                'excel_body' => $excel_body,
            ]);
        }
    }

    /**
     * 把活动产品excel主要信息A-G转list数组
     * @return list
     */
    public function actionChangeExcelToListForActiveProducts($file_path)
    {
        $excel_data = Tools::format_excel2array($file_path);
        foreach ($excel_data as $k => $v) {
            if ($k > 1) {
                $excel_body[] = $v;
            }
        }
        foreach ($excel_body as $k => $v) {
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
        return $list;
    }

    /**
     * 检测excel数据
     */
    public function actionCheckExcelActiveProducts($file_path)
    {
        $list = $this->actionChangeExcelToListForActiveProducts($file_path);
        $product_ids = [];
        $messages = [];
        foreach ($list as $k => $v) {
            if (in_array($v['product_id'], $product_ids)) {
                $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '此产品重复'];
            } else {
                $this_product_info = Product::find()->where(['itemid' => $v['product_id']])->one();
                if (!$this_product_info) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '没有此产品'];
                } elseif ($this_product_info['activeid'] > 0) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '当前产品正在活动中'];
                } elseif ($this_product_info['status'] != Product::STATUS_SHELVE) {
                } elseif ($this_product_info['price'] == 0) {
                    $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '当前产品并未上架'];
                } elseif ($this_product_info['price'] < $v['active_price'] || $this_product_info['price'] == $v['active_price']) {
                    $messages[] = ['type' => 'danger', 'product_id' => $v['product_id'], 'msg' => '活动价格应该小于当前产品价格'];
                } elseif ($this_product_info['price'] != $v['original_price']) {
                    $messages[] = ['type' => 'warning', 'product_id' => $v['product_id'], 'msg' => '原价与当前产品价格不符'];
                }
                $product_ids[] = $v['product_id'];
            }
        }
        return $messages;
    }

    /**
     * 由excel插入数据到数据库
     */
    public function actionImportExcelActiveProductsToDatabase($file_path)
    {
        $ActiveGoods = new ActiveGoods();
        $ActvieProducts = new ActiveProducts();
        ActiveGoods::deleteAll(['actid' => Module::ACTIVE_ID]);
        ActiveProducts::deleteAll(['active_id' => Module::ACTIVE_ID]);
        $excel_data = Tools::format_excel2array($file_path);
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($excel_data as $k => $v) {
                if ($k > 1) {
                    $active_id = $v['A'];
                    $product_id = $v['B'];
                    $active_price = $v['C'];
                    $original_price = $v['D'];
                    $market_id = $v['E'];
                    $market_active_price = $v['F'];
                    $market_original_price = $v['G'];
                    $sales_id = Sales::getSalesIdFromProductIdAndMarketId($v['B'], $v['E']);
                    $sales_price = $sales_id>0?Supply::findOne(['pid'=>$product_id, 'fid'=>$sales_id])->price:0;
                    $product_info = Product::findOne(['itemid'=>$product_id]);
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
                    $actvie_products = clone $ActvieProducts;
                    $actvie_products->active_id = $active_id;
                    $actvie_products->product_id = $product_id;
                    $actvie_products->active_price = $active_price;
                    $actvie_products->original_price = $original_price;
                    $actvie_products->price_bak = $product_info['price'];
                    $actvie_products->market_id = $market_id;
                    $actvie_products->sales_id = $market_id > 0 ? $sales_id : 0;
                    $actvie_products->market_active_price = $market_active_price;
                    $actvie_products->market_original_price = $market_original_price;
                    $actvie_products->market_price_bak = $sales_price;
                    $actvie_products->save();
                }
            }
            $status = 1;
        } catch (Exception $e) {
            $transaction->rollBack();
            $status = 0;
        }
        if($status>0){
            Yii::$app->getSession()->setFlash('success', '保存成功');
            $this->redirect(['/activity/active-products']);
        }else{
            Yii::$app->getSession()->setFlash('error', '保存失败');
            $this->goBack();
        }
    }

    /**
     * 由php文件插入数据到数据库
     */
    public function actionModifyActiveProducts()
    {
        $staticActiveProducts = $this->getStaticActiveProducts();
        ActiveGoods::deleteAll();
        ActiveProducts::deleteAll();
        $ActiveGoods = new ActiveGoods();
        $ActvieProducts = new ActiveProducts();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($staticActiveProducts as $k => $v) {
                // 插入到active goods表里
                $active_goods = clone $ActiveGoods;
                $active_goods->actid = $v['active_id'];
                $active_goods->pid = $v['product_id'];
                $active_goods->price = $v['active_price'];
                $active_goods->marketprice = $v['market_active_price'];
                $active_goods->marketid = $v['market_id'];
                $active_goods->menshiid = $v['market_id'] > 0 ? $v['sales_info']['id'] : 0;
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
                $actvie_products->sales_id = $v['market_id'] > 0 ? $v['sales_info']['id'] : 0;
                $actvie_products->market_active_price = $v['market_active_price'];
                $actvie_products->market_original_price = $v['market_original_price'];
                $actvie_products->market_price_bak = $v['market_id'] > 0 ? $v['supply_info']['price'] : 0;
                $actvie_products->save();
            }
        } catch (Exception $e) {
            $transaction->rollBack();
        }
        $this->redirect(['/activity/active-products']);
    }
}
