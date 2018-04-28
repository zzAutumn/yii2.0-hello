<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\UserSetting;
use app\models\UserSettingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * UserSettingController implements the CRUD actions for UserSetting model.
 */
class UserSettingController extends Controller
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
     * Lists all UserSetting models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*
        $searchModel = new UserSettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        */
        // returns record id not user_id
        $id = UserSetting::initialize(Yii::$app->user->getId());

        return $this->redirect(['update','id'=>$id]);
    }

    /**
     * Displays a single UserSetting model.
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
     * Creates a new UserSetting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserSetting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserSetting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new UserSetting;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/avatar/';
            $image = UploadedFile::getInstance($model, 'image');
            var_dump($image);exit();
            if (!is_null($image)) {
                // path to existing image for post-delete
                $image_delete = $model->avatar;
                // save new image
                // store the source file name
                $model->filename = $image->name;
                $name_arr = explode(".", $image->name);
                $ext = end($name_arr);
                // generate a unique file name to prevent duplicate filenames
                $model->avatar = Yii::$app->security->generateRandomString().".{$ext}";
                $model->user_id = Yii::$app->user->getId();
                if($model->save()){
                    $path = Yii::$app->params['uploadPath'] . $model->avatar;
                    $image->saveAs($path);
                    Image::thumbnail(Yii::$app->params['uploadPath'].$model->avatar, 120, 120)
                        ->save(Yii::$app->params['uploadPath'].'sqr_'.$model->avatar, ['quality' => 50]);
                    Image::thumbnail(Yii::$app->params['uploadPath'].$model->avatar, 30, 30)
                        ->save(Yii::$app->params['uploadPath'].'sm_'.$model->avatar, ['quality' => 50]);
                    $model->deleteImage(Yii::$app->params['uploadPath'],$image_delete);
                } else {
                    // error in saving model
                    // pass thru to form
                    echo '<pre>';
                    print_r($model->getErrors());
                    exit();
                }
            } else {
                // simple save
                $model->save();
                // pass thru to form
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserSetting model.
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
     * Finds the UserSetting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserSetting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserSetting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
