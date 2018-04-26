<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\MirnaTarget;
use yii\data\Pagination;
use yii\data\Sort;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\ScoreInfo;
use app\models\StudentInfo;



class HelloController extends Controller
{
    public function actionIndex()
    {
        //sort
        $sort = new Sort([
            'attributes'=>[
                'energy'=>[
                    'default'=>SORT_DESC,
                    'label' => 'Energy',
                ],
                'score'=>[
                    'label'=>'Score'
                ],
            ],
        ]);

        //pagination
        $query = MirnaTarget::find()
            ->where(['mirnaName'=>'aly-miR156a-3p'])
            ->orderBy($sort->orders);

        $count = $query->count();
        $pagination = new Pagination(['totalCount'=>$count]);
        $data = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();


        return $this->render('index',[
           'data'=>$data,
            'pagination'=>$pagination,
            'sort'=>$sort,
        ]);
    }

    public function actionIndex2()
    {
        $dataProvider = new ActiveDataProvider([
            'query'=>MirnaTarget::find()
                ->where(['mirnaName'=>'aly-miR156a-3p'])
                ->all(),
            'pagination'=>[
                'pageSize'=>20,
            ],
        ]);



        return $this->render('index2',[
            'dataProvider'=>$dataProvider,
        ]);
    }

    public function actionIndex3($target = "world")
    {
        return $this->render('index3',['target'=>$target]);
    }

}