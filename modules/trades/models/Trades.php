<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/31
 * Time: 16:25
 */

namespace app\modules\trades\models;


use app\models\Members;

class Trades extends \app\models\Trades
{
    public function getMember()
    {
        return $this->hasOne(Members::className(), ['username'=>'buyer']);
    }
}