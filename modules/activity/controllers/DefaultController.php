<?php

namespace app\modules\activity\controllers;
use app\modules\activity\models\ActiveProducts;

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
        $staticActiveProducts = ActiveProducts::$staticActiveProducts;
        return $this->render('index', [
            'staticActiveProducts' => $staticActiveProducts,
        ]);
    }
}
