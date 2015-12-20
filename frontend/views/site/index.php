<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="jumbotron">
        <a class="btn btn-lg btn-success" href="<?=Url::to(['login-form/index'])?>"><?= Yii::t('app','Yii Homework#2') ?></a>
        <p><a class="btn btn-lg btn-success" href="<?=Url::to(['tables/index'])?>"><?= Yii::t('app','Yii Homework#3') ?></a></p>
        <p><a class="btn btn-lg btn-success" href="<?=Url::to(['teachers/index'])?>"><?= Yii::t('app','Yii Homework#4') ?></a></p>
    </div>

</div>
