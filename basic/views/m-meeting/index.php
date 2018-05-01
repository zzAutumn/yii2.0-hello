<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MMeetingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meetings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmeeting-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#upcoming" role="tab" data-toggle="tab">Upcoming</a></li>
        <li><a href="#past" role="tab" data-toggle="tab">Past</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="upcoming">
            <div class="meeting-index">

                <?= $this->render('_grid', [
                    'dataProvider' => $upcomingProvider,
                    'searchModel' => $searchModel,
                ]) ?>

            </div> <!-- end of upcoming meetings tab -->
        </div>

        <div class="tab-pane" id="past">

            <?= $this->render('_grid', [
                'dataProvider' => $pastProvider,
                'searchModel' => $searchModel,
            ]) ?>

        </div> <!-- end of past meetings tab -->


    </div>

    <p>
        <?= Html::a('Create Mmeeting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'owner_id',
            'meeting_type',
            'message:ntext',
            'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
</div>
