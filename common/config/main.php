<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'   => 'ru-RU',
    'components' => [
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass'   => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request'      => [
            'class' => 'common\components\LangRequest'
        ],
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'class'           => 'common\components\LangUrlManager',
            'rules'           => [
                '<controller:\w+>/<action:\w+>'            => '<controller>/<action>',
                '<lang:\w+>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ]
        ],
        'i18n'         => [
            'translations' => [
                'app*' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    // 'forceTranslation' => true,
                    'basePath' => '@common/messages',
                    'fileMap'  => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params'     => [
        'languages' => [
            'ru' => 'Русский',
            'ua' => 'Українська',
            'en' => 'English'
        ]
    ]
];
