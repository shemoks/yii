<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ModelsTeachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userSurname') ?>

    <?= $form->field($model, 'userName') ?>

    <?= $form->field($model, 'nickName') ?>

    <?= $form->field($model, 'dateBorn') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php //echo $form->field($model, 'imageFile') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'id_department') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
