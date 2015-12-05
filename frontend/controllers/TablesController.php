<?php
namespace frontend\controllers;

use frontend\models\Tables;
use yii\web\Controller;
use yii;

class TablesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}