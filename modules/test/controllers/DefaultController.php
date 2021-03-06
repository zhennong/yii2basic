<?php

namespace app\modules\test\controllers;

use app\controllers\InitController;
use yii\web\Controller;

/**
 * Default controller for the `test` module
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

    public function actionPjaxTime()
    {
        return $this->render('pjax-time',['time'=>date("h:i:s")]);
    }

    public function actionTestAjaxModal()
    {
        return $this->render('test-ajax-modal', []);
    }
}
