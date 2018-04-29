<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MMeetingPlace */

$this->title = 'Add a Mmeeting Place';
$this->params['breadcrumbs'][] = ['label' => 'Mmeetings', 'url' => ['/meeting/index']];
$this->params['breadcrumbs'][] = ['label'=>$title,'url' => ['/meeting/view', 'id' => $model->meeting_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmeeting-place-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
