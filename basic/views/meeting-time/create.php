<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MeetingTime */

$this->title = 'Create Meeting Time';
$this->params['breadcrumbs'][] = ['label' => 'Mmeetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmeeting-time-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
