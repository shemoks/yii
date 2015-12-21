<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ModelsTeaching */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teachings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teaching-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Teaching'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn'
            ], [
                'attribute' => 'id_subject',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return $model->idSubject->title;
                },
            ],
            [
                'attribute' => 'id_teacher',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return $model->idTeacher->userSurname;
                },
            ],
            'year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
