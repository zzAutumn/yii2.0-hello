<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingNote */

$this->title = 'Update Meeting Note: ';
$this->params['breadcrumbs'][] = ['label' => 'Mmeeting', 'url' => ['m-meeting/view','id' => $model->meeting_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mmeeting-note-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
