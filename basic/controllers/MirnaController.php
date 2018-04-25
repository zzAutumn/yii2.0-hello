<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/3/23
 * Time: 上午8:04
 */
namespace app\controllers;

use yii\web\Controller;
use yii\web\UrlManager;
use yii\data\Pagination;
use app\models\Mirna;


class MirnaController extends Controller
{

    public $layout = 'mirna';
    public function actionIndex()
    {
        //echo 'test';
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRelatedData()
    {
        return $this->render('relatedData');
    }

    public function actionBrowse()
    {
       /* $model=new Mirna();*/

        $query=Mirna::find();
        $pagination=new Pagination([
            'defaultPageSize'=>5,
            'totalCount'=>$query->count(),
        ]);

        $table=$query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('browse',
            ['table'=>$table,
                'pagination'=>$pagination,]);
    }

    public function actionSearch()
    {
        return $this->render('search');
    }

    public function actionResult()
    {
        $request=\Yii::$app->request;
        $name=$request->get('name');

        return $this->render('result',['name'=>$name]);
    }

    public function actionDownload()
    {
        return $this->render('download');
    }

    public function actionPmirexat()
    {
        return $this->render('pmirexat');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionSupport()
    {
        return $this->render('support');
    }
}