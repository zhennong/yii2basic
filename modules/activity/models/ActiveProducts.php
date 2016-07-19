<?php

namespace app\modules\activity\models;

use yii\behaviors\TimestampBehavior;

class ActiveProducts extends \app\models\ActiveProducts
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
