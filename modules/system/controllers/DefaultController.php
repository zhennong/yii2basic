<?php

namespace app\modules\system\controllers;

use app\controllers\InitController;

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
        return $this->render('index');
    }
}
