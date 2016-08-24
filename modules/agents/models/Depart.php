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

    public static function getInvestmentManagers()
    {
        $managers = Depart::find()->joinWith('member')->select([
            Depart::tableName().".username",
            'userid',
            'truename',
        ])->where(['bumen' => Depart::INVESTMENT])->asArray()->all();
        return $managers;
    }
}