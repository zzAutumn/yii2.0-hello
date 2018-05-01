<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'UVLMnz2YS6G23X8Td3phJLAHpkRP7Tax',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        */
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => 'yjjjng0901@163.com',
                'password' => "yejingjing0901",
                'port' => '587',
                'encryption' => 'ssl',
            ],
        ],
        'mailgun'=>[
            'class' => 'vendor.baibaratsky.php-mailgun.MailgunYii',
            'domain' => 'example.com',
            'key' => 'key-65e5db09337892dce21ecba03d425f28',
            'tags' => array('yii'),
            'enableTracking' => false,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'status' => 'status/index',
                'status/index' => 'status/index',
                'status/create' => 'status/create',
                'status/view/<id:\d+>' => 'status/view',
                'status/update/<id:\d+>' => 'status/update',
                'status/delete/<id:\d+>' => 'status/delete',
                'status/<slug>' => 'status/slug',
                'defaultRoute' => '/site/index',
            ],
        ],

    ],
    /*'user' => [
        'class' => 'dektrium\user\Module',
        'enableUnconfirmedLogin' => true,
        //'confirmWithin' => 21600,
        //'cost' => 12,
        //'admins' => ['admin']
    ],*/
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            /*'modelMap' => [
                'User' => 'app\models\User',
            ],*/
            'admins' => ['admin']
        ],
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/uploads',
            'uploadUrl' => "@web/uploads",
            'imageAllowExtensions'=>['jpg','png','gif','jpeg'],

        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
