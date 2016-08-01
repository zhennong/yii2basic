<?php

namespace app\modules\products\models;

use app\components\Tools;

class Products extends \app\models\Products
{
    public function afterFind()
    {
        parent::afterFind();
        $this->thumb = self::getThumbUrl($this->thumb);
    }
}
