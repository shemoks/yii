<?php
/**
 * Created by PhpStorm.
 * User: oksana
 * Date: 21.11.15
 * Time: 23:16
 */

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models\LoginForm;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class LoginFormController extends Controller
{

    public function actionIndex()
    {
        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->imageFile =  UploadedFile::getInstance($model, 'imageFile');
            $model->imageFile->name = time() . substr(strrchr($model->imageFile->name, '.'), 0);
            $model->upload();
            return $this->render('index', ['model' => $model]);
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }

}