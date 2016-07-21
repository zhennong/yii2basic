<?php

namespace app\modules\activity\controllers;

use app\modules\activity\models\Product;
use app\modules\activity\models\Supply;
use app\modules\activity\Module;
use Yii;
use app\modules\activity\models\ActiveProducts;
use app\modules\activity\models\ActiveProductsSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActiveProductsController implements the CRUD actions for ActiveProducts model.
 */
class ActiveProductsController extends ActivityController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ActiveProducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActiveProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ActiveProducts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ActiveProducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ActiveProducts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ActiveProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ActiveProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ActiveProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActiveProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActiveProducts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 活动产品调价
     */
    public function actionModifyActiveProductsPrice()
    {
        $status = ActiveProducts::modifyActivePrice();
        if($status>0){
            Yii::$app->getSession()->setFlash('success', '调价成功');
            $this->redirect(['/activity/products']);
        }else{
            Yii::$app->getSession()->setFlash('error', '调价失败');
            $this->goBack();
        }
    }

    /**
     * 恢复活动产品
     */
    public function actionRecoveryActiveProductsPrice()
    {
        $status = ActiveProducts::recoveryPrice();
        if($status>0){
            Yii::$app->getSession()->setFlash('success', '恢复成功');
            $this->redirect(['/activity/active-products']);
        }else{
            Yii::$app->getSession()->setFlash('error', '恢复失败');
            $this->goBack();
        }
    }

    /**
     * 活动门市调价
     */
    public function actionModifyActiveSalesPrice()
    {
        $status = ActiveProducts::modifySalesActivePrice();
        if($status>0){
            Yii::$app->getSession()->setFlash('success', '调价成功');
            $this->redirect(['/activity/supply']);
        }else{
            Yii::$app->getSession()->setFlash('error', '调价失败');
            $this->goBack();
        }
    }

    /**
     * 恢复活动门市
     */
    public function actionRecoveryActiveSalesPrice()
    {
        $status = ActiveProducts::recoverySalesPrice();
        if($status>0){
            Yii::$app->getSession()->setFlash('success', '恢复成功');
            $this->redirect(['/activity/active-products']);
        }else{
            Yii::$app->getSession()->setFlash('error', '恢复失败');
            $this->goBack();
        }
    }

    /**
     * 调价
     */
    public function actionModifyPrice()
    {

    }

    /**
     * 恢复价格
     */
    public function actionRecoveryPrice()
    {

    }
}
