<?php

namespace app\modules\activity\controllers;

use app\components\Tools;
use app\modules\activity\models\ActiveGoods;
use app\modules\activity\models\ExcelTool;
use Yii;
use app\modules\activity\models\ActiveProducts;
use app\modules\activity\models\ExcelUploadForm;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * Default controller for the `activity` module
 */
class DefaultController extends ActivityController
{
    public function behaviors()
    {
        /*$behaviors = parent::behaviors();
        $behaviors['verbs']['actions'][] = ['delete-excel-active-products'=>['post']];
        return $behaviors;*/
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete-excel-active-products' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $staticActiveProducts = ActiveProducts::getStaticActiveProducts();
        return $this->render('index', [
            'staticActiveProducts' => $staticActiveProducts,
        ]);
    }

    /**
     * 导入活动产品
     */
    public function actionImportActiveProducts()
    {
        $staticActiveProducts = ActiveProducts::getStaticActiveProducts();
        $messages = ExcelTool::checkExcelActiveProducts($staticActiveProducts);
        return $this->render('import-active-products', [
            'messages' => $messages,
        ]);
    }

    /**
     * 由php文件插入数据到数据库
     */
    public function actionModifyActiveProducts()
    {
        $staticActiveProducts = ActiveProducts::getStaticActiveProducts();
        $status = ExcelTool::importListlActiveProductsToDatabase($staticActiveProducts);
        if($status>0){
            Yii::$app->session->setFlash('success', '导入成功');
            $this->redirect(['/activity/active-products']);
        }else{
            Yii::$app->session->setFlash('error', '导入失败');
            $this->goBack();
        }
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
                    $list = ExcelTool::changeExcelToListForActiveProducts($saveAs);
                    $messages = ExcelTool::checkExcelActiveProducts1($list);
//                    $messages = [];
                    if(count($messages)>0){
                        unlink($saveAs);
                        $messages_render = $this->renderPartial('import-active-products', [
                            'messages' => $messages,
                        ]);
                        Yii::$app->session->setFlash('error', $messages_render);
                    }else{
                        $transaction = Yii::$app->db->beginTransaction();
                        try{
                            ExcelTool::importListlActiveProductsToDatabase($list);
                            /*ActiveProducts::modifyActivePrice($list);
                            ActiveProducts::modifySalesActivePrice($list);*/
                            $transaction->commit();
                            $status = 1;
                        }catch (Exception $e){
                            $transaction->rollBack();
                            $status = 0;
                        }
                        if($status>0){
                            Yii::$app->session->setFlash('success', '导入数据成功');
                        }else{
                            Yii::$app->session->setFlash('error', '导入数据失败');
                        }
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
        $list = ExcelTool::changeExcelToListForActiveProducts($file_path);
        $transaction = Yii::$app->db->beginTransaction();
        try{
            ActiveProducts::recoveryPrice($list);
            ActiveProducts::recoverySalesPrice($list);
            foreach($list as $k => $v){
                ActiveProducts::deleteAll(['active_id'=>$v['active_id'], 'product_id'=>$v['product_id']]);
                ActiveGoods::deleteAll(['actid'=>$v['active_id'], 'pid'=>$v['product_id']]);
            }
            $transaction->commit();
            $status = 1;
        }catch (Exception $e){
            $transaction->rollBack();
            $status = 0;
        }
        if($status>0){
            Yii::$app->getSession()->setFlash('success', '删除成功');
            unlink($file_path);
            $this->redirect(['/activity/default/excel-import-active-products']);
        }else{
            Yii::$app->getSession()->setFlash('error', '删除失败');
            $this->goBack();
        }
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
     * 由excel插入数据到数据库
     */
    public function actionimportListlActiveProductsToDatabase($file_path)
    {
        $excel_data = Tools::format_excel2array($file_path);
        $status = ExcelTool::importListlActiveProductsToDatabase($excel_data);
        if($status>0){
            Yii::$app->getSession()->setFlash('success', '保存成功');
            $this->redirect(['/activity/active-products']);
        }else{
            Yii::$app->getSession()->setFlash('error', '保存失败');
            $this->goBack();
        }
    }
}
