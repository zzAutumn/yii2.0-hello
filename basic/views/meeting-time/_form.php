<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\assets\AppAsset;
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

            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'start',
                'language' => 'en',
                'size' => 'lg',
                'template' => '<div class="well well-md" style="background-color: #09f287; width:550px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',//'dd-M-yyyy  H:i:s', //yyyy-m-d
                    'todayBtn' => true,
                    'minuteStep'=> 15,
                    'pickerPosition' => 'center',
                    'todayHighlight'=>true,
                ]
            ]);?>
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
