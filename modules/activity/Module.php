<?php

namespace app\modules\activity;

/**
 * activity module definition class
 */
class Module extends \yii\base\Module
{
    const ACTIVE_ID = 25;
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\activity\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
