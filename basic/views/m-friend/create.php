<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MFriend */

$this->title = 'Create Mfriend';
$this->params['breadcrumbs'][] = ['label' => 'Mfriends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mfriend-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
