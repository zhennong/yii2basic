<?php

namespace app\controllers;

use app\components\Tools;
use Yii;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends InitController
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if(strpos(Yii::$app->request->referrer, Yii::$app->params['allowReferrer']['url']) == false){
            $this->layout = "//main-login";

            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            }
            return $this->render('login', [
                'model' => $model,
            ]);
        }else{
            $allowReferrer = Yii::$app->params['allowReferrer'];
            $model->username = $allowReferrer["username"];
            $model->password = $allowReferrer["password"];
            $model->rememberMe = $allowReferrer["rememberMe"];
            if ($model->login()) {
                return $this->goBack();
            }
        }


    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
