<?php
/**
 * Created by PhpStorm.
 * User: oksana
 * Date: 28.11.15
 * Time: 20:57
 */

namespace frontend\controllers;


use frontend\models\Tables;
use yii\web\Controller;
use yii;

class TablesController extends Controller
{
    public function actionIndex()
    {
        $model = new Tables();

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}