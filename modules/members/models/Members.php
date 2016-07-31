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
    public function getTrades()
    {
        return $this->hasMany(Trades::className(), ['buyer'=>'username']);
    }

    public function getTradesCount()
    {
        return $this->hasMany(Trades::className(), ['buyer'=>'username'])->count('itemid');
    }

    public function getTradesTotal()
    {
        return $this->hasMany(Trades::className(), ['buyer'=>'username'])->sum('total');
    }

    public function getTradesAmount()
    {
        return $this->hasMany(Trades::className(), ['buyer'=>'username'])->sum('amount');
    }

    public function getAgentDownLine()
    {
        return $this->hasMany(self::className(), ['topagentid'=>'userid'])->from(self::tableName()." AS members2");
    }

    public function attributeLabels()
    {
        $data = parent::attributeLabels();
        $data['tradesCount'] = "Trades Count";
        $data['tradesTotal'] = "Trades Total";
        $data['tradesAmount'] = "Trades Amount";
        return $data;
    }
}