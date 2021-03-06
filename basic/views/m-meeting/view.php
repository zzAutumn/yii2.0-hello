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

<?php /*if (Yii::$app->session->hasFlash("success")){
    echo "<div class='alert alert-success'>".Yii::$app->session->getFlash("success")."</div>";
} */?>

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

                        <?= Html::a('', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger glyphicon glyphicon-remove btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('', ['update', 'id' => $model->id], ['class' => 'btn btn-primary glyphicon glyphicon-pencil','title'=>'Edit']) ?>
                        <?= Html::a('', ['send-email', 'id' => $model->id], ['class' => 'btn btn-success glyphicon glyphicon-send']) ?>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading"><h2 class="panel-title" style="font-size: 25px">Place</h2></div>
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

        <div class="panel-heading"><h2 class="panel-title" style="font-size: 25px">Dates &amp; Times</h2></div>
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

        <div class="panel-heading"><h2 class="panel-title" style="font-size: 25px">Participants</h2>
        </div>
        <div class="panel-body" >
            <div style="float:right;">
                <?= Html::a('', ['participant/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary  glyphicon glyphicon-plus']) ?>
                <?= Html::a('', ['participant/update', 'meeting_id' => $model->id], ['class' => 'btn btn-primary  glyphicon glyphicon-pencil']) ?>
            </div>

            <?= ListView::widget([
                'dataProvider' => $participantProvider,
                'itemOptions' => ['class' => 'item'],
                'layout' => '{items}',
                'itemView' => '../participant/_list',
            ]) ?>

        </div>

        <div class="panel-heading"><h2 class="panel-title" style="font-size: 25px">Notes</h2></div>
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






