<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teachers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Teachers'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userSurname',
            'userName',
            'nickName',
            'dateBorn',
            // 'sex',
            // 'education',
            // 'email:email',
            // 'phone',
            // 'imageFile',
            // 'password',
            // 'id_department',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
