<?php

namespace humhub\modules\absences\controllers;

use Yii;
use humhub\modules\absences_module\models\AbsenceSession;
use humhub\modules\absences_module\models\AbsenceSessionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AbsenceSessionController implements the CRUD actions for AbsenceSession model.
 */
class AbsenceSessionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AbsenceSession models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AbsenceSessionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AbsenceSession model.
     * @param integer $student_id
     * @param integer $session_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($student_id, $session_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($student_id, $session_id),
        ]);
    }

    /**
     * Creates a new AbsenceSession model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AbsenceSession();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'student_id' => $model->student_id, 'session_id' => $model->session_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AbsenceSession model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $student_id
     * @param integer $session_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($student_id, $session_id)
    {
        $model = $this->findModel($student_id, $session_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'student_id' => $model->student_id, 'session_id' => $model->session_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AbsenceSession model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $student_id
     * @param integer $session_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($student_id, $session_id)
    {
        $this->findModel($student_id, $session_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AbsenceSession model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $student_id
     * @param integer $session_id
     * @return AbsenceSession the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($student_id, $session_id)
    {
        if (($model = AbsenceSession::findOne(['student_id' => $student_id, 'session_id' => $session_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
