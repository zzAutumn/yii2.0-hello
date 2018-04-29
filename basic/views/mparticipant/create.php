<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MParticipant */

$this->title = 'Create Mparticipant';
$this->params['breadcrumbs'][] = ['label' => 'Mparticipants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mparticipant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
