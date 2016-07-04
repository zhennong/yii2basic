<?php

namespace app\modules\activity\controllers;

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
     * @param string $active_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionView($active_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($active_id, $product_id),
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
            return $this->redirect(['view', 'active_id' => $model->active_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ActiveProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $active_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionUpdate($active_id, $product_id)
    {
        $model = $this->findModel($active_id, $product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'active_id' => $model->active_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ActiveProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $active_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionDelete($active_id, $product_id)
    {
        $this->findModel($active_id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ActiveProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $active_id
     * @param integer $product_id
     * @return ActiveProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($active_id, $product_id)
    {
        if (($model = ActiveProducts::findOne(['active_id' => $active_id, 'product_id' => $product_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
