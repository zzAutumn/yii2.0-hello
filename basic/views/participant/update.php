<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Participant */

$this->title = 'Update Mparticipant: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Mparticipants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mparticipant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
