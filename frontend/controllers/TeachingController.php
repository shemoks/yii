<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Teaching;
use frontend\models\ModelsTeaching;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeachingController implements the CRUD actions for Teaching model.
 */
class TeachingController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Teaching models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModelsTeaching();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teaching model.
     * @param integer $id_subject
     * @param integer $id_teacher
     * @param integer $year
     * @return mixed
     */
    public function actionView($id_subject, $id_teacher, $year)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_subject, $id_teacher, $year),
        ]);
    }

    /**
     * Creates a new Teaching model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Teaching();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_subject' => $model->id_subject, 'id_teacher' => $model->id_teacher, 'year' => $model->year]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Teaching model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_subject
     * @param integer $id_teacher
     * @param integer $year
     * @return mixed
     */
    public function actionUpdate($id_subject, $id_teacher, $year)
    {
        $model = $this->findModel($id_subject, $id_teacher, $year);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_subject' => $model->id_subject, 'id_teacher' => $model->id_teacher, 'year' => $model->year]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Teaching model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_subject
     * @param integer $id_teacher
     * @param integer $year
     * @return mixed
     */
    public function actionDelete($id_subject, $id_teacher, $year)
    {
        $this->findModel($id_subject, $id_teacher, $year)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teaching model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_subject
     * @param integer $id_teacher
     * @param integer $year
     * @return Teaching the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_subject, $id_teacher, $year)
    {
        if (($model = Teaching::findOne(['id_subject' => $id_subject, 'id_teacher' => $id_teacher, 'year' => $year])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}