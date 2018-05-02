<?php

namespace app\controllers;

use Yii;
use app\models\MMeeting;
use app\models\MeetingPlace;
use app\models\MeetingPlaceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MMeetingPlaceController implements the CRUD actions for MMeetingPlace model.
 */
class MeetingPlaceController extends Controller
{
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
     * Lists all MMeetingPlace models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MeetingPlaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MMeetingPlace model.
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
     * Creates a new MMeetingPlace model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($meeting_id)
    {
        $model = new MeetingPlace();
        $request = Yii::$app->request->post('input');
        $model->meeting_id = (int)$meeting_id;
        $model->place_name = $request;

        //exit();
        if ($model->validate()) {
            // all inputs are valid
            $model->save();
            return $this->redirect(['m-meeting/view', 'id' => $model->meeting_id]);
        } else{
            // validation failed

            return $this->render('create', [
                'model' => $model,
            ]);
        }



    }

    /**
     * Updates an existing MMeetingPlace model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($meeting_id)
    {
        $model = MeetingPlace::findOne(['meeting_id'=>$meeting_id]);

        if ($model == NULL){     //如果为空的话返回之前的页面，先create
            return $this->redirect(['/m-meeting/view',
                'id'=>$meeting_id,
            ]);
        }
        $place_name = Yii::$app->request->post('input');
        if ($place_name) {
            $model->place_name = $place_name;
            $model->save();
            return $this->redirect(['/m-meeting/view', 'id' => $model->meeting_id]);
        }else{
            var_dump($model->getErrors());
            //exit();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MMeetingPlace model.
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
     * Finds the MMeetingPlace model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MeetingPlace the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $id = (int)$id;
        $model = MeetingPlace::find()->where(['meeting_id'=>$id])->one();
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
