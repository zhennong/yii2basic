<?php

namespace app\modules\special\controllers;

use Yii;
use app\modules\special\models\SpecialProducts;
use app\modules\special\models\SpecialProductsSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpecialProductsController implements the CRUD actions for SpecialProducts model.
 */
class SpecialProductsController extends DefaultController
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
     * Lists all SpecialProducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpecialProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SpecialProducts model.
     * @param integer $special_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionView($special_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($special_id, $product_id),
        ]);
    }

    /**
     * Creates a new SpecialProducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SpecialProducts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'special_id' => $model->special_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SpecialProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $special_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionUpdate($special_id, $product_id)
    {
        $model = $this->findModel($special_id, $product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'special_id' => $model->special_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SpecialProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $special_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionDelete($special_id, $product_id)
    {
        $this->findModel($special_id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SpecialProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $special_id
     * @param integer $product_id
     * @return SpecialProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($special_id, $product_id)
    {
        if (($model = SpecialProducts::findOne(['special_id' => $special_id, 'product_id' => $product_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
