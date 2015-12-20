<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\MyAsset;
use yii\helpers\Html;
use common\widgets\Alert;
use yii\helpers\Url;

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
    <?= \frontend\widgets\lang\LangWidget::widget();?>
    <?= \frontend\widgets\menu\MenuWidget::widget([
        'siteName'     => Yii::t('app', 'College'),
        'topMenuItems' => [
            [
                'iconClass'    => 'fa-user',
                'dropdownData' => [
                    [
                        'icon' => 'fa-user',
                        'link' => '/',
                        'text' => Yii::t('app', 'Home'),
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
                'text' => Yii::t('app', 'Home'),
            ],
            [
                'icon'        => 'fa-table',
                'text'        => Yii::t('app', 'Tables'),
                'subMenuData' => [
                    [
                        'link' => Url::to(['teachers/index']),
                        'text' => Yii::t('app', 'Teachers'),
                    ],
                    [
                        'link' => Url::to(['departments/index']),
                        'text' => Yii::t('app','Departments'),
                    ],
                    [
                        'link' => Url::to(['subjects/index']),
                        'text' => Yii::t('app','Subjects'),
                    ],
                    [
                        'link' => Url::to(['teaching/index']),
                        'text' => Yii::t('app','Teaching'),
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
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;  <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>

    </div>

</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
