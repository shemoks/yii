<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teaching */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teaching-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_subject')->textInput() ?>

    <?= $form->field($model, 'id_teacher')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
