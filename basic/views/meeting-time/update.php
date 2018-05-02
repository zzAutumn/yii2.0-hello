<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingTime */

$this->title = 'Update Meeting Time:';
$this->params['breadcrumbs'][] = ['label' => 'Mmeeting Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mmeeting-time-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
