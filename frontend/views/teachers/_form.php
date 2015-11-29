<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Teachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-form">
    <?php
    $form = ActiveForm::begin([
        'id'                   => 'teachers',
  //    'enableClientValidation' => false,
       'enableAjaxValidation' => true,
        'options'              => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
    ]) ?>

    <?= $form->field($model, 'userSurname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nickName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateBorn')->textInput(['placeholder' => '2015-01-01']) ?>

    <?php $model->sex = empty($model->sex) ? 'man' : $model->sex; ?>
    <?= $form->field($model, 'sex')->radioList(['man' => 'М', 'women' => 'Ж']) ?>

    <?= $form->field($model, 'education')->dropDownList([
        ''                  => '',
        'base'              => 'базовое',
        'middle'            => 'среднее',
        'unfinished higher' => 'не законченное высшее',
        'higher'            => 'высшее',
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['placeholder' => '(067)898-78-67']) ?>

    <?= $form->field($model, 'imageFile')->fileInput(); ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <?= $form->field($model, 'id_department')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php if (!empty($model->imageFile)) { ?>
        <div class="image">
            <img src="<?= $model->imageFile ?>">
        </div>
    <?php } ?>

</div>
