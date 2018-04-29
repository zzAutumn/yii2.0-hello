<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MParticipant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mparticipant-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    <p>Email address:</p>
    <?php
    // preload friends into array
    echo yii\jui\AutoComplete::widget([
        'model' => $model,
        'attribute' => 'email',
        'clientOptions' => [
            'source' => $friends,
        ],
    ]);
    ?>
    <?= $form->field($model, 'meeting_id')->textInput() ?>

    <?= $form->field($model, 'participant_id')->textInput() ?>

    <?= $form->field($model, 'invited_by')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
