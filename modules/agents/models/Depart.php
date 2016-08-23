<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/22
 * Time: 14:58
 */

namespace app\modules\agents\models;


use app\models\Members;

class Depart extends \app\models\Depart
{
    public function getMember()
    {
        return $this->hasOne(Members::className(), ['username'=>'username']);
    }
}