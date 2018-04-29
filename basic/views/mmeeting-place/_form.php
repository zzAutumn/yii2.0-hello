<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;


/* @var $this yii\web\View */
/* @var $model app\models\MMeetingPlace */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mmeeting-place-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    <h3>Choose one of your places</h3>


    <?= $form->field($model, 'suggested_by')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
