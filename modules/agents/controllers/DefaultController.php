<?php

namespace app\modules\agents\controllers;

use app\components\Tools;
use Yii;
use app\controllers\InitController;
use app\models\Admin;
use yii\db\Exception;

/**
 * Default controller for the `agents` module
 */
class DefaultController extends InitController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAddAgentManagerMenu()
    {
        $has_user_id = 45540;
        $user_id = 90471;
        $admin_has = Admin::find()->where(['userid'=>$has_user_id])->asArray()->all();
        $admin = [];
        foreach ($admin_has as $k =>$v){
            $admin[$k] = $v;
            $admin[$k]['userid'] = $user_id;
            unset($admin[$k]['adminid']);
        }
        $transaction = Yii::$app->db->beginTransaction();
        try{
            Yii::$app->db->createCommand()->batchInsert(Admin::tableName(), array_keys($admin[0]), $admin)->execute();
            $transaction->commit();
            $status = 1;
        }catch (Exception $e){
            $transaction->rollBack();
            var_dump($e->errorInfo);
            $status = 0;
        }
        echo $status;
    }
}
