<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/22
 * Time: 14:51
 */

namespace app\modules\agents\controllers;

use Yii;
use app\modules\agents\models\Depart;

class AgentMembersController   extends DefaultController
{
    public function actionMembers()
    {
        $manages = Depart::find()->joinWith('member')->select([
            Depart::tableName().".username",
            'userid',
            'truename',
        ])->where(['bumen' => Depart::INVESTMENT])->asArray()->all();
        return $this->render('members', [
            'manages'=>$manages,
        ]);
    }
}