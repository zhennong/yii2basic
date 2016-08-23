<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/23
 * Time: 16:50
 */

namespace app\modules\agents\models;


use app\models\Area;
use app\models\AreaAgentAssign;

class AreaManageAssign extends AreaAgentAssign
{
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['areaid'=>'area_id']);
    }
}