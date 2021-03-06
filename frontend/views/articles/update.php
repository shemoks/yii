<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\models\Articles */
/* @var $modelTeacher common\models\models\ArticleTeacher */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Articles',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="articles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelTeacher' => $modelTeacher

    ]) ?>

</div>
