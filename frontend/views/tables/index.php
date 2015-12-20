<?php
use yii\helpers\Url;
?>
<div class="myIndex">
    <h1><?= Yii::t('app','College') ?></h1>
</div>
<div class="buttons">
    <a class="btn btn-lg btn-success" href="<?=Url::to(['teachers/index'])?>"><?= Yii::t('app','Teachers') ?></a>
    <a class="btn btn-lg btn-success" href="<?=Url::to(['departments/index'])?>"><?= Yii::t('app','Departments') ?></a>
    <a class="btn btn-lg btn-success" href="<?=Url::to(['subjects/index'])?>"><?= Yii::t('app','Subjects') ?></a>
    <a class="btn btn-lg btn-success" href="<?=Url::to(['teaching/index'])?>"><?= Yii::t('app','Teaching') ?></a>
</div>