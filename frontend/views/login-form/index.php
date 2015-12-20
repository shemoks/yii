<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="col-md-8 col-md-offset-2 my-form">
    <?php

    $form = ActiveForm::begin([
        'id'                   => 'login-form',
//        'enableClientValidation' => true,
        'enableAjaxValidation' => true,
        'options'              => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
    ]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'userName') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'userSurname') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nickName') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'dateBorn')->textInput(['placeholder' => '2015-01-01']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php $model->sex = empty($model->sex) ? 'man' : $model->sex; ?>
            <?= $form->field($model, 'sex')->radioList(['man' => 'М', 'women' => 'Ж']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'education')->dropDownList([
                ''                  => '',
                'base'              => 'базовое',
                'middle'            => 'среднее',
                'unfinished higher' => 'не законченное высшее',
                'higher'            => 'высшее',
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput(['placeholder' => '(067)898-78-67']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'imageFile')->fileInput(); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end()
    ?>
    <?php if (!empty($model->imageFile)) { ?>
        <div class="image">
            <img src="/uploads/<?= $model->imageFile ?>">
        </div>
    <?php } ?>
</div>