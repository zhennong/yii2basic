<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 7/3/16
 * Time: 10:16 AM
 */

namespace app\controllers;

use app\components\Tools;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\User;
use yii\web\Controller;

class InitController extends Controller
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        if(strpos(Yii::$app->request->referrer, Yii::$app->params['allowReferrer']['url']) == false){}else{
            Yii::$app->session->set('layout', 'nongyao');
            $this->layout = "//nongyao";
        }
        if(Yii::$app->session->get('layout')=='nongyao'&&Yii::$app->request->referrer!=null){
            $this->layout = "//nongyao";
        }else{
            Yii::$app->session->set('layout', 'main');
            $this->layout = '//main';
        }
        User::$users = Yii::$app->params['adminUsers'];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except'=>['login'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
}