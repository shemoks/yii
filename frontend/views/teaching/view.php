<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\models\Teaching */

$this->title = $model->id_subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teachings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teaching-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_subject' => $model->id_subject, 'id_teacher' => $model->id_teacher, 'year' => $model->year], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_subject' => $model->id_subject, 'id_teacher' => $model->id_teacher, 'year' => $model->year], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_subject',
            'id_teacher',
            'year',
        ],
    ]) ?>

</div>
