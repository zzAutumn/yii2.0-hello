<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\MMeeting */

$this->title = $model->getMeetingType($model->meeting_type) .' '.'Meeting';
$this->params['breadcrumbs'][] = ['label' => 'Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$timeCount = $timeProvider->count;
?>
<div class="mmeeting-view">

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <div class="row">
                <div class="col-lg-12"><h1><?= Html::encode($this->title) ?></h1></div>
            </div>
        </div>

        <div class="panel-body">
            <?= $model->message ?>


        </div>



        <div class="panel-footer">
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6" >
                    <div style="float:right;">
                        <!-- <?/*= Html::a('Send', ['finalize', 'id' => $model->id], ['class' => 'btn btn-primary '.(!$model->isReadyToSend?'disabled':'')]) */?>
                    --><?/*= Html::a('Finalize', ['finalize', 'id' => $model->id], ['class' => 'btn btn-success '.(!$model->isReadyToFinalize?'disabled':'')]) */?>
                        <?/*= Html::a('Invite Participants', ['/mparticipant/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary']) */?>
                       <!-- --><?/*= Html::a('Add Place', ['/m-meeting-place/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary']) */?>
                        <?/*= Html::a('Add Time', ['/meeting-time/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary']) */?>
                        <?/*= Html::a('Add Note', ['/m-meeting-note/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary']) */?>

                        <?= Html::a('', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger glyphicon glyphicon-remove btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('', ['update', 'id' => $model->id], ['class' => 'btn btn-primary glyphicon glyphicon-pencil','title'=>'Edit']) ?>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading"><h2 class="panel-title" style="font-size: 28px">Place</h2></div>
        <div class="panel-body" >
            <div style="float:right;">
                <?= Html::a('', ['meeting-place/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary  glyphicon glyphicon-plus']) ?>
                <?= Html::a('', ['meeting-place/update', 'meeting_id' => $model->id], ['class' => 'btn btn-primary  glyphicon glyphicon-pencil']) ?>
            </div>


            <?= ListView::widget([
                'dataProvider' => $placeProvider,
                'itemOptions' => ['class' => 'item'],
                'layout' => '{items}',
                'itemView' => '../meeting-place/_list',
            ]) ?>

        </div>

        <div class="panel-heading"><h2 class="panel-title" style="font-size: 28px">Dates &amp; Times</h2></div>
        <div class="panel-body" >
            <div style="float:right;">
                <?= Html::a('', ['meeting-time/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary  glyphicon glyphicon-plus']) ?>
                <?= Html::a('', ['meeting-time/update', 'meeting_id' => $model->id], ['class' => 'btn btn-primary  glyphicon glyphicon-pencil']) ?>

            </div>

            <?= ListView::widget([
                'dataProvider' => $timeProvider,
                'itemOptions' => ['class' => 'item'],
                'layout' => '{items}',
                'itemView' => '../meeting-time/_list',
            ]) ?>
        </div>

        <div class="panel-heading"><h2 class="panel-title" style="font-size: 28px">Notes</h2></div>
        <div class="panel-body" >
            <div style="float:right;">
                <?= Html::a('', ['meeting-note/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary  glyphicon glyphicon-plus']) ?>
                <?= Html::a('', ['meeting-note/update', 'meeting_id' => $model->id], ['class' => 'btn btn-primary  glyphicon glyphicon-pencil']) ?>

            </div>


            <?= ListView::widget([
                'dataProvider' => $noteProvider,
                'itemOptions' => ['class' => 'item'],
                'layout' => '{items}',
                'itemView' => '../meeting-note/_list',
            ]) ?>

        </div>
    </div>

</div>




    <!--<h3>Places</h3>
    <?/*= ListView::widget([
        'dataProvider' => $placeProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{items}',
        'itemView' => '../meeting-place/_list',
    ]) */?>

    <h3>Dates &amp; Times</h3>
    <?/*= ListView::widget([
        'dataProvider' => $timeProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{items}',
        'itemView' => '../meeting-time/_list',
    ]) */?>

    <h3>Note</h3>
    --><?/*= ListView::widget([
        'dataProvider' => $noteProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{items}',
        'itemView' => '../meeting-note/_list',
    ]) */?>



