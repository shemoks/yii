<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\models\Articles */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelTeacher array */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id_teacher')->widget(Select2::classname(), [
        'data' => $modelTeacher,
        'options' => ['placeholder' => 'Select a teacher'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true
        ],
    ])->label('teachers');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
