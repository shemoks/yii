<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\models\Teaching */

$this->title = Yii::t('app', 'Create Teaching');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teachings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teaching-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'subjects' =>$subjects
    ]) ?>

</div>
