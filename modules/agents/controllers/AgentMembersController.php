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
        $managers = Depart::getInvestmentManagers();
        return $this->render('members', [
            'managers'=>$managers,
        ]);
    }
}