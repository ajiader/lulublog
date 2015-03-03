<?php

namespace app\controllers;

use app\core\front\BaseFrontController;
use app\models\EntryForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends BaseFrontController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
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
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($message = 'Hello')
    {
//        echo Yii::$app->formatter->asDate('2014-01-01', 'long');
        echo Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        return  $this->render('say', ['message'=>$message]);
    }

    public function actionEntry()
    {
        $model = new EntryForm();

        if($model->load(Yii::$app->request->post()) && $model->validate() )
        {
            //验证$model收到的数据

            //做些有意义的事
            return $this->render('entry-confirm', ['model' =>$model]);
        }else{
            //无视是初始化显示还是验证数据错误
            return $this->render('entry', ['model' => $model]);
        }
    }
    public function actionHelloWorld()
    {
        return 'Hello World';
    }

    public function actionSendmail()
    {
        $mail = Yii::$app->mailer->compose();
        $mail->setTo('503563755@qq.com');
        $mail->setSubject('邮件测试周枚接收');
        $mail->setTextBody('内容测试内容测试内容测试');
        $mail->setHtmlBody('问撒的撒问撒的撒问撒的撒问撒的撒');
        if($mail->send())
        {
            echo "发送成功";
        }else{
            echo "failse";
        }
        die();
    }
}
