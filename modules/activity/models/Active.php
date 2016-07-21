<?php

namespace app\modules\activity\models;

class Active extends \app\models\Active
{
    public static function getLastActiveId()
    {
        $last_active_info = self::find()->orderBy(['addtime'=>SORT_DESC])->one();
        return $last_active_info['id'];
    }
}
