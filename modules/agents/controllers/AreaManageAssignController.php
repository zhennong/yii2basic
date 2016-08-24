<?php

namespace app\modules\agents\controllers;

use app\components\Tools;
use app\models\Area;
use app\models\AreaAgentAssign;
use app\modules\agents\models\Depart;
use Yii;
use app\modules\agents\models\AreaManageAssign;
use app\modules\agents\models\AreaManageAssignSearch;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2mod\alert\Alert;

/**
 * AreaManageAssignController implements the CRUD actions for AreaManageAssign model.
 */
class AreaManageAssignController extends DefaultController
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
     * Lists all AreaManageAssign models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AreaManageAssignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 随机分配地区
     */
    public function actionAssign()
    {
        $model = new AreaManageAssign();
        $managers = Depart::getInvestmentManagers();
        $managers_arr = ArrayHelper::map($managers, 'userid', 'username');
        $stable_areas = $model::find()->select(['area_id'])->where(['fasten'=>$model::FASTEN_STABLE])->asArray()->all();
        $stable_area_arr = ArrayHelper::map($stable_areas, 'area_id', 'area_id');
        $index_areas = Area::find()->select(['areaid', 'areaname', 'parentid'])->where(['not in', 'areaid', $stable_area_arr])->asArray()->all();
        $transaction = Yii::$app->db->beginTransaction();
        try{
            $model::deleteAll(['fasten'=>$model::FASTEN_DEFAULT]);
            $data = [];
            foreach ($index_areas as $k => $v){
                $manager_id = array_rand($managers_arr, 1);
                $data[] = [$v['areaid'], $manager_id, $model::FASTEN_DEFAULT];
            }
            Yii::$app->db->createCommand()->batchInsert($model::tableName(), ['area_id', 'manager_id', 'fasten'], $data)->execute();
            $transaction->commit();
            $status = 1;
        }catch (Exception $e){
            $transaction->rollBack();
            $status = 0;
        }
        Yii::$app->session->setFlash('success', '分配成功');
        return $this->redirect(['/agents/area-manage-assign']);
    }

    /**
     * Displays a single AreaManageAssign model.
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
     * Creates a new AreaManageAssign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AreaManageAssign();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->area_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AreaManageAssign model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->area_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AreaManageAssign model.
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
     * Finds the AreaManageAssign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AreaManageAssign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AreaManageAssign::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
