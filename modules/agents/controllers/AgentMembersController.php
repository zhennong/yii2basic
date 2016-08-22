<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/22
 * Time: 14:51
 */

namespace app\modules\agents\controllers;

use Yii;
use app\components\Tools;
use app\modules\agents\models\Depart;

class AgentMembersController   extends DefaultController
{
    public function actionMembers()
    {
        $manages = Depart::find()->select(['username'])->where(['bumen' => Depart::FREIGHT_DEPRATMENT])->asArray()->all();
        return $this->render('members');
    }
}