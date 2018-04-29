<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MMeetingTime */

$this->title = 'Create Mmeeting Time';
$this->params['breadcrumbs'][] = ['label' => 'Mmeeting Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmeeting-time-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
