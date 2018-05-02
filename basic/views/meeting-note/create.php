<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MeetingNote */

$this->title = 'Add a Meeting Note';
$this->params['breadcrumbs'][] = ['label' => 'Mmeetings', 'url' => ['m-meeting/view','id' => $model -> meeting_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmeeting-note-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
