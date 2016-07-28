<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/25
 * Time: 18:43
 */

namespace app\modules\members\models;


use app\models\Trades;

class Members extends \app\models\Members
{
    public function getBuyTrades()
    {
        return $this->hasMany(Trades::className(), ['buyer'=>'username']);
    }
}