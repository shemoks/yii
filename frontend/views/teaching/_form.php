<?php

use common\models\models\Subjects;
use common\models\models\Teachers;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\models\Teaching */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teaching-form">


    <?php $form = ActiveForm::begin(); ?>


    <?= /** @var \common\models\models\Subjects $subjects */
    $form->field($model, 'id_subject')->widget(Select2::classname(), [
        'data'          => $subjects,
        'options'       => [
            'placeholder' => Yii::t('app', 'Select {title}', [
                'title' => (new Subjects)->getAttributeLabel('title')
            ])
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?=

    /** @var \common\models\models\Teachers $teachers */
    $form->field($model, 'id_teacher')->widget(Select2::classname(), [
        'data'          => $teachers,
        'options'       => [
            'placeholder' => Yii::t('app', 'Select {userSurname}', [
                'userSurname' => (new Teachers)->getAttributeLabel('userSurname'),
                'usrName' => (new Teachers)->getAttributeLabel('userName'),

            ])
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
