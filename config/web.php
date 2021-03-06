<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'language'=>'zh-CN',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'abcd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' =>'smtp.163.com',
                'username' => 'ajiader@163.com',
                'password'=>'guojiaaiqin',
                'port' => '25',
                'encryption' => 'tls',
            ],
            'messageConfig' =>[
                'charset' => 'UTF-8',
                'from' => ['ajiader@163.com'=>'admin'],
            ],
//            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'authManager' => [
            'class' => 'yii\rbac\Dbmanager',
        ]
    ],
//    'defaultRoute' => 'country',
    'params' => $params,
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
            'modules' => [
                'rbac' => [
                    'class' => 'app\modules\admin\modules\rbac\RbacModule',
                ],
            ],
        ],
    ],

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
