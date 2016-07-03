<?php

namespace app\modules\activity\controllers;

use app\controllers\InitController;

/**
 * Default controller for the `activity` module
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
