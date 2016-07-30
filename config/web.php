<?php

$params = array_merge(require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php'));

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Chongqing',
    'aliases' => [
        '@uploads' => dirname(__DIR__) . '/web/uploads',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'vnf3GJN5xw7L0Wk-HAEK6X4gPyKPFrQg',
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
        'db' => require(__DIR__ . '/db-local.php'),
        'assetManager' => [
            'basePath' => '@webroot/web/assets',
            'baseUrl' => '@web/web/assets',
            'converter' => [
                'class' => 'yii\web\AssetConverter',
            ],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'Y-M-d',
            'datetimeFormat' => 'Y-M-d H:i:s',
            'timeFormat' => 'H:i:s',
        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            /*'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@common/messages',
                'forceTranslation' => true
            ],*/
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module'
        ],
        // 活动
        'activity' => [
            'class' => 'app\modules\activity\Module',
        ],
        // 产品
        'products' => [
            'class' => 'app\modules\products\Module',
        ],
        // 专题
        'special' => [
            'class' => 'app\modules\special\Module',
        ],
        // 测试
        'test' => [
            'class' => 'app\modules\test\Module',
        ],
        // 优惠码
        'promo' => [
            'class' => 'app\modules\promo\Module',
        ],
        // 用户
        'members' => [
            'class' => 'app\modules\members\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['192.168.0.*', '127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['192.168.0.*', '127.0.0.1', '::1'],
    ];
}

return $config;
