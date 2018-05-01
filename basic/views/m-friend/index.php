<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MFriendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My friends';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mfriend-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add friends', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            [
                    'attribute' => 'friend_id',
                    'label'=>'Friend',
                    'value'=>function($dataProvider){
                        return User::findOne($dataProvider['friend_id'])->username;
                    }
            ],
            //'status',
            'number_meetings',
            [
                   'attribute'=>'email',
                    'value'=>function($dataProvider){
                        return User::findOne($dataProvider['friend_id'])->username;
                    }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php
//var_dump($dataProvider->models);
$model = $dataProvider->getModels();
//var_dump($model);