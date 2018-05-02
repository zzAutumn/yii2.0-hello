<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MMeeting */

$this->title = 'Update Mmeeting: ';
$this->params['breadcrumbs'][] = ['label' => 'Mmeetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mmeeting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
