<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\MyAsset;
use yii\helpers\Html;
use common\widgets\Alert;

MyAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="wrapper">
    <?= \frontend\widgets\menu\MenuWidget::widget([
        'siteName'     => Yii::t('app', 'College'),
        'topMenuItems' => [
            [
                'iconClass'    => 'fa-user',
                'dropdownData' => [
                    [
                        'icon' => 'fa-user',
                        'link' => '/',
                        'text' => 'home',
                    ],[
                        'icon' => 'fa-github',
                        'link' => 'https://github.com/shemoks',
                        'text' => 'gitHub',
                    ],
                ]
            ],
        ],
        'leftMenu' => [
            [
                'icon' => 'fa-home',
                'link' => '/',
                'text' => 'home',
            ],
            [
                'icon'        => 'fa-table',
                'text'        => 'Tables',
                'subMenuData' => [
                    [
                        'link' => '/index.php?r=teachers/index',
                        'text' => 'Teachers',
                    ],
                    [
                        'link' => '/index.php?r=departments/index',
                        'text' => 'Departments',
                    ],
                    [
                        'link' => '/index.php?r=subjects/index',
                        'text' => 'Subjects',
                    ],
                    [
                        'link' => '/index.php?r=teaching/index',
                        'text' => 'Teaching',
                    ]
                ],
            ],
        ]
    ]) ?>
    </nav>
    <div id="page-wrapper" style="min-height: 252px;">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
