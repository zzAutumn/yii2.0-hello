<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\MMeeting */

$this->title = $model->getMeetingType($model->meeting_type) .' '.'Meeting';
$this->params['breadcrumbs'][] = ['label' => 'Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmeeting-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= $model->message ?>
    </p>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Invite Participants', ['/mparticipant/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add Place', ['/mmeeting-place/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add Time', ['/mmeeting-time/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add Note', ['/mmeeting-note/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <h3>Places</h3>
    <?= ListView::widget([
        'dataProvider' => $placeProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{items}',
        'itemView' => '../meeting-place/_list',
    ]) ?>

    <h3>Dates &amp; Times</h3>
    <?= ListView::widget([
        'dataProvider' => $timeProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{items}',
        'itemView' => '../meeting-time/_list',
    ]) ?>

    <h3>Note</h3>
    <?= ListView::widget([
        'dataProvider' => $noteProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{items}',
        'itemView' => '../meeting-note/_list',
    ]) ?>

</div>

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
                    <?= Html::a('', ['cancel', 'id' => $model->id], ['class' => 'btn btn-primary glyphicon glyphicon-remove btn-danger','title'=>'Cancel']) ?>
                    <?= Html::a('', ['update', 'id' => $model->id], ['class' => 'btn btn-primary glyphicon glyphicon-pencil','title'=>'Edit']) ?>
                </div>
            </div>
        </div> <!-- end row -->
    </div>
</div>
