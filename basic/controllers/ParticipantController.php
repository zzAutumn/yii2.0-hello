<?php

namespace app\controllers;

use Yii;
use app\models\Participant;
use app\models\ParticipantSearch;
use app\models\MMeeting;
use app\models\MFriend;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Inflector;

/**
 * MParticipantController implements the CRUD actions for MParticipant model.
 */
class ParticipantController extends Controller
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
     * Lists all MParticipant models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParticipantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MParticipant model.
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
     * Creates a new MParticipant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($meeting_id)
    {

        $mtg = new MMeeting();
        $title = $mtg->getMeetingTitle($meeting_id);
        $model = new Participant();
        $model->meeting_id= $meeting_id;
        $model->invited_by= Yii::$app->user->getId();
        // to do move into model
        // load user's friends into email list array for autocomplete
        $friend_list = MFriend::find()->where(['user_id'=>Yii::$app->getUser()->id])->all();
        $email_list = [];
        foreach ($friend_list as $x){
            $email_list[] = $x->oldAttributes["email"];
        }

        if ((Yii::$app->request->post())) {
            // to do fix saving and validation
            // add new user when needed
            // validate the form against model rules
            $email = Yii::$app->request->post();
            if ($model->validate()) {
                // all inputs are valid
                $model->participant_id = $model->add($email);
                $model->save();
                return $this->redirect(['m-meeting/view', 'id' => $meeting_id]);
            } else {
                // validation failed

                return $this->render('create', [
                    'model' => $model,
                    'title' => $title,

                ]);
            }
        } else {
            return $this->render('create', [
            'model' => $model,
            'title' => $title,

            ]);
        }
    }

    /**
     * Updates an existing MParticipant model.
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
     * Deletes an existing MParticipant model.
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
     * Finds the MParticipant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Participant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Participant::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
