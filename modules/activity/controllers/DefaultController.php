<?php

namespace app\modules\activity\controllers;

/**
 * Default controller for the `activity` module
 */
class DefaultController extends ActivityController
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
