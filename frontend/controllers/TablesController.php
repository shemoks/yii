<?php
namespace frontend\controllers;


use yii\web\Controller;
use yii;

class TablesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}