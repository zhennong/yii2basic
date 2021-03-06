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
use app\models\Members;

class AreaManageAssign extends AreaAgentAssign
{
    public $area_name;
    public $manager;
    public $manager_name;
    
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['areaid'=>'area_id']);
    }

    public function getMembers()
    {
        return$this->hasOne(Members::className(), ['userid'=>'manager_id']);
    }
}