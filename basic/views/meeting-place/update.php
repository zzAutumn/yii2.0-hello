<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingPlace */

$this->title = 'Update Mmeeting Place: ';
$this->params['breadcrumbs'][] = ['label' => 'Mmeeting', 'url' => ['m-meeting/view','id' => $model->meeting_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mmeeting-place-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
