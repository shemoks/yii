<?php

use common\models\models\Subjects;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\models\Teaching */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teaching-form">


    <?php $form = ActiveForm::begin(); ?>


    <?= /** @var \frontend\models\Subjects $subjects */
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

    <?= $form->field($model, 'id_teacher')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
