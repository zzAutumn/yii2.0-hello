<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\assets\AppAsset;
use janisto\timepicker\TimePicker;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\MeetingTime */
/* @var $form yii\widgets\ActiveForm */

AppAsset::register($this);
$this->registerCssFile("@web/css/meeting/meeting-time.css");
?>

<div class="mmeeting-time-form">

    <div class="row">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(); ?>
            <?=
            $form->field($model, 'status')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Enter event time ...'],
                'size' => 'lg',
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);
            ?>

        </div>
    </div>
    <div class="clearfix"><p></div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Add' :'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
            <?php ActiveForm::end(); ?>


</div>
