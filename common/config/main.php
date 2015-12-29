<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru-RU',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'common\components\LangUrlManager',
            'rules' => [
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<lang:\w+>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ]
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    // 'forceTranslation' => true,
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ]
    ],
    'params' => [
        'languages' => [
            'ru' => 'Русский',
            'ua' => 'Українська',
            'en' => 'English'
        ]
    ]
];
