<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
//use app\assets\AppAsset;
use app\assets\EventAsset;
EventAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="event-index">

    <h1 id="test"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        Modal::begin([
                'header'=>'<h4>Event</h4>',
                'id'=>'modal',
                'size'=>'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>


     <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
         'header'        => [
             'left'   => 'today prev,next',
             'center' => 'title',
             'right'  => 'timelineDay,timelineThreeDays,month',
         ],
         'clientOptions' => [
             'now'               =>  date('Y-m-d',time()),
             //'editable'          => true, // enable draggable events
             'aspectRatio'       => 1.8,
             'views'             => [
                 'timelineThreeDays' => [
                     'type'     => 'timeline',
                     'duration' => ['days' => 3],
                 ],
             ],
             ],
  )); ?>

</div>

<?php
/*$this->registerJsFile('@web/js/event.js');
*/?>