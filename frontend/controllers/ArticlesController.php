<?php

namespace frontend\controllers;

use common\models\models\Teachers;
use Yii;
use common\models\models\Articles;
use common\models\search\Articles as ArticlesSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\models\ArticleTeacher;

/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ArticlesController extends Controller
{
    public $layout = "myLayout";
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create','update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
          'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticlesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articles model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articles();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /** @var Teachers[] $teachers */
            $teachers = Teachers::find()->where(['id'=>$model->id_teacher])->all();
            foreach($teachers as $teacher){
                $model->link('teachers', $teacher);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', array(
                'model' => $model,
                'modelTeacher' => ArrayHelper::map(Teachers::find()->all(),'id','userSurname','userName')
            ));
        }
    }

    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->id_teacher = ArrayHelper::getColumn($model->teachers,'id');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->unlinkAll('teachers', true);
            $teachers = Teachers::find()->where(['id'=>$model->id_teacher])->all();
            foreach($teachers as $teacher){
                $model->link('teachers', $teacher);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelTeacher' => ArrayHelper::map(Teachers::find()->all(),'id','userSurname','userName')
            ]);
        }
    }

    /**
     * Deletes an existing Articles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $model->unlinkAll('teachers', true);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
