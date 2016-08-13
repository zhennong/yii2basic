<?php

namespace app\modules\system\controllers;

use app\components\Tools;
use app\controllers\InitController;
use yii\helpers\ArrayHelper;

/**
 * Default controller for the `system` module
 */
class DefaultController extends InitController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $variables = \Yii::$app->db->createCommand('show variables')->queryAll();
        $variables = ArrayHelper::map($variables, 'Variable_name', 'Value');
        $global_status = \Yii::$app->db->createCommand('show global status')->queryAll();
        $global_status = ArrayHelper::map($global_status, 'Variable_name', 'Value');
        return $this->render('index', [
            'variables'=>$variables,
            'global_status'=>$global_status,
        ]);
    }
}
