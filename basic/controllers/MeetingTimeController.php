<?php

namespace app\controllers;

use Yii;
use app\models\MeetingTime;
use app\models\MMeeting;
use app\models\MeetingTimeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MMeetingTimeController implements the CRUD actions for MMeetingTime model.
 */
class MeetingTimeController extends Controller
{
    const STATUS_PROPOSED = 0;
    const STATUS_SELECTED = 10;

    /**
     * @inheritdoc
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
     * Lists all MMeetingTime models.
     * @return mixed
     */
    public function actionIndex()
    {

        $this->redirect(Yii::getAlias('@web').'/m-meeting');
    }

    /**
     * Displays a single MMeetingTime model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MMeetingTime model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($meeting_id)
    {
        $mtg = new MMeeting();
        $title = $mtg->getMeetingTitle($meeting_id);
        $model = new MeetingTime();
        $model->meeting_id = $meeting_id;
        $model->suggested_by= Yii::$app->user->getId();
        $model->status = self::STATUS_PROPOSED;
        if ($model->load(Yii::$app->request->post())) {
            // convert date time to timestamp
            $model->start = strtotime($model->start);
            // validate the form against model rules
            if ($model->validate()) {
                // all inputs are valid
                $model->save();
                return $this->redirect(['/m-meeting/view', 'id' => $model->meeting_id]);
            } else {
                // validation failed
                return $this->render('create', [
                    'model' => $model,
                    'title' => $title,
                ]);
            }
        }else{
            return $this->render('create', [
                'model' => $model,
                'title' => $title,
            ]);
        }

    }

    /**
     * Updates an existing MMeetingTime model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MMeetingTime model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MMeetingTime model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MeetingTime the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MeetingTime::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
