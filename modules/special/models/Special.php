<?php

namespace app\modules\special\models;

use yii\behaviors\TimestampBehavior;

class Special extends \app\models\Special
{
    public function behaviors()
    {
        return [
            [
                'class'=>TimestampBehavior::className(),
            ]
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            return true;
        }else{
            return false;
        }
    }
}
