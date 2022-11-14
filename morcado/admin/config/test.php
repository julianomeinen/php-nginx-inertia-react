<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/test_db.php';

return [
    'id' => 'morcado',
    'name' => 'Morcado Manager System',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'inertia'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'en-US',
    'components' => [
        'inertia' => [
            'class' => 'tebe\inertia\Inertia',
            'assetsDirs' => [
                '@webroot/public/assets/inertia'
            ],
            'view' => '@webroot/vendor/tebe/yii2-inertia/views/inertia',
        ],
        'db' => $db,
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
            'messageClass' => 'yii\symfonymailer\Message'
        ],
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],
        'request' => [
            'class' => 'tebe\inertia\web\Request',
            'cookieValidationKey' => 'H_9wHrDxu4sBxyRMj6Ckfkc5CnFejlqU',
        ],
    ],
    'params' => $params,
];