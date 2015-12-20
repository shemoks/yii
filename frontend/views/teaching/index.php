<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ModelsTeaching */
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
            'id_teacher',
            'year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
