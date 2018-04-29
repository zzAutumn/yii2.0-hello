<?php

namespace app\controllers;

use Yii;
use app\models\MMeeting;
use app\models\MMeetingTime;
use app\models\MMeetingSearch;
use app\models\MParticipant;
use app\models\MMeetingNote;
use app\models\MMeetingPlace;
use app\models\MFriend;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\helpers\Inflector;
/**
 * MMeetingController implements the CRUD actions for MMeeting model.
 */
class MMeetingController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                /*'only' => ['index','create','update','view'],*/
                'rules' => [
                    // allow authenticated users
                    [
                        'actions' => ['index','create','view','slug'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::ROLE_USER,
                            User::ROLE_MODERATOR,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        // Allow moderators and admins to update
                        'roles' => [
                            User::ROLE_MODERATOR,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all MMeeting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MMeetingSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //add filter for upcoming or past
        $upcomingProvider = new ActiveDataProvider([
            'query'=>MMeeting::find()->joinWith('mParticipants')->where(['owner_id'=>Yii::$app->user->getId()])->orWhere(['participant_id'=>Yii::$app->user->getId()])->andWhere(['m_meeting.status'=>[MMeeting::STATUS_PLANNING,MMeeting::STATUS_CONFIRMED]]),
        ]);
        $pastProvider = new ActiveDataProvider([
            'query' => MMeeting::find()->joinWith('mParticipants')->where(['owner_id'=>Yii::$app->user->getId()])->orWhere(['participant_id'=>Yii::$app->user->getId()])->andWhere(['m_meeting.status'=>MMeeting::STATUS_COMPLETED]),
        ]);
        $canceledProvider = new ActiveDataProvider([
            'query' => MMeeting::find()->joinWith('mParticipants')->where(['owner_id'=>Yii::$app->user->getId()])->orWhere(['participant_id'=>Yii::$app->user->getId()])->andWhere(['m_meeting.status'=>MMeeting::STATUS_CANCELED]),
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
            'upcomingProvider' => $upcomingProvider,
            'pastProvider' => $pastProvider,
            'canceledProvider' => $canceledProvider,
        ]);
    }

    /**
     * Displays a single MMeeting model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $timeProvider = new ActiveDataProvider([
            'query' => MMeetingTime::find()->where(['meeting_id'=>$id]),
        ]);

        $noteProvider = new ActiveDataProvider([
            'query' => MMeetingNote::find()->where(['meeting_id'=>$id]),
        ]);

        $placeProvider = new ActiveDataProvider([
            'query' => MMeetingPlace::find()->where(['meeting_id'=>$id]),
        ]);

        $participantProvider = new ActiveDataProvider([
            'query' => MParticipant::find()->where(['meeting_id'=>$id]),
        ]);
        //$model = $this->findModel($id);
        //$model->prepareView();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'participantProvider' => $participantProvider,
            'timeProvider' => $timeProvider,
            'noteProvider' => $noteProvider,
            'placeProvider' => $placeProvider,
        ]);
    }

    /**
     * Creates a new MMeeting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($meeting_id)
    {
        $mtg = new MMeeting();
        $title = $mtg->getMeetingTitle($meeting_id);
        $model = new MParticipant();
        $model->meeting_id= $meeting_id;
        $model->invited_by= Yii::$app->user->getId();
        // load friends for auto complete field
        $friends = MFriend::getFriendList(Yii::$app->user->getId());

        if ($model->load(Yii::$app->request->post())) {
            if (!User::find()->where(['email' => $model->email])->exists()) {
                // if email not already registered
                //  create new user with temporary username & password
                $temp_email_arr[] = $model->email;
                $model->username = Inflector::slug(implode('-', $temp_email_arr));
                $model->password = Yii::$app->security->generateRandomString(12);
                $model->participant_id = $model->addUser();
            } else {
                // add participant from user record
                $usr = User::find()->where(['email' => $model->email])->one();
                $model->participant_id = $usr->id;
            }
            // validate the form against model rules
            if ($model->validate()) {
                // all inputs are valid
                $model->save();
                return $this->redirect(['/meeting/view', 'id' => $meeting_id]);
            }
        }
    }

    /**
     * Updates an existing MMeeting model.
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
     * Deletes an existing MMeeting model.
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
     * Finds the MMeeting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MMeeting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MMeeting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
