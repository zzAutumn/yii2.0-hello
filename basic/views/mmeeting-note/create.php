<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MMeetingNote */

$this->title = 'Create Mmeeting Note';
$this->params['breadcrumbs'][] = ['label' => 'Mmeeting Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmeeting-note-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
