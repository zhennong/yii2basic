<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 10:01
 */

namespace app\modules\test\controllers;

class TestController extends DefaultController
{
    public function actionTest1()
    {
        $this->layout = 'ly1';
        return $this->render('test1');
    }
}