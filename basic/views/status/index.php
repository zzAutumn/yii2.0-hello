<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'message:html',
            //'permissions',
            //'created_at:date',
            'updated_at:date',
            //'updated_by',
            'createdBy.username',

            ['class' => 'yii\grid\ActionColumn',
              'template' => '{view}{update}{delete}',
                'buttons' => [
                        'view' => function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                        'status/'.$model->slug, ['title' => Yii::t('yii', 'View'),]);
                        }
                ],

            ],
        ],
    ]); ?>
</div>
