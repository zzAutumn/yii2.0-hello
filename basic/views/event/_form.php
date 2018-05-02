<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\EventAsset;
use janisto\timepicker\TimePickerAsset;

TimePickerAsset::register($this);
EventAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reporter')->textInput(['maxlength' => true]) ?>
   <!-- --><?/*= $form->field($model, 'time')->textInput(['maxlength' => true]) */?>
    <?= $form->field($model, 'time')->widget(\janisto\timepicker\TimePicker::className(), [
        //'language' => 'fi',
        'mode' => 'datetime',
        'clientOptions'=>[
            'dateFormat' => 'yy-mm-dd',
            'timeFormat' => 'HH:mm:ss',
            'showSecond' => true,]]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'created_at')->textInput() */?><!--
    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
