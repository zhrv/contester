<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'vendorPath' => '../vendor',
    'defaultRoute' => 'contest',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                'admin' => 'admin/index',
//                'admin/users/<id:\d+>' => 'admin/users',
//                'admin/users/<id:\d+>/<cmd:(delete|edit|view)>' => 'admin/users',
//                'admin/solution/<id:\d+>' => 'admin/solution',
//                'admin/contest/<id:\d+>/<action:(hash|result)>' => 'admin/contest',
//                'admin/contest/<id:\d+>' => 'admin/contest',
//                'admin/contest/<cid:\d+>/<uid:\d+>' => 'admin/contestuser',
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'eUpRWJK8XSrF4h04XUJU1H-9UeDKp5_1',
        ],
        /*'cache' => [
            'class' => 'yii\caching\FileCache',
        ],*/
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/login']
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
        ],
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    //$config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
