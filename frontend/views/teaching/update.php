<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\models\Teaching */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Teaching',
]) . ' ' . $model->id_subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teachings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subject, 'url' => ['view', 'id_subject' => $model->id_subject, 'id_teacher' => $model->id_teacher, 'year' => $model->year]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="teaching-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'subjects' =>$subjects,
        'teachers' => $teachers
    ]) ?>

</div>
