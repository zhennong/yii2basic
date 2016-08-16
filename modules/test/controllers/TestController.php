<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 10:01
 */

namespace app\modules\test\controllers;

use app\components\Tools;
use app\models\Supply;
use yii\filters\VerbFilter;

class TestController extends DefaultController
{
    public function behaviors()
    {
        return [
            'verbs'=>[
                'class'=>VerbFilter::className(),
                'actions'=>[
                    'test3'=>['post'],
                ],
            ],
        ];
    }

    public function actionTest1()
    {
        $this->layout = 'ly1';
        return $this->render('test1');
    }

    public function actionTest2()
    {
        $y =Supply::getSalesIdsArr();
        Tools::_vp($y);
        return $this->render('test2');
    }

    public function actionTest3()
    {
        Supply::getAllSupplyDetail();
    }
}