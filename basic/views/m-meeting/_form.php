<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MMeeting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mmeeting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?/*= $form->field($model, 'owner_id')->textInput() */?>

    <?= $form->field($model, 'meeting_type')->dropDownList([
            $model->getMeetingTypeOptions(),
    ]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?/*= $form->field($model, 'status')->textInput() */?>

    <?/*= $form->field($model, 'created_at')->textInput() */?>

    <?/*= $form->field($model, 'updated_at')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
