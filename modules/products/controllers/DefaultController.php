<?php

namespace app\modules\products\controllers;

use app\controllers\InitController;

/**
 * Default controller for the `products` module
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
