<?php

namespace app\modules\special\controllers;

use app\controllers\InitController;
use yii\web\Controller;

/**
 * Default controller for the `special` module
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
}
