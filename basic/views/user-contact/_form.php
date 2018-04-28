<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserContact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-contact-form">

    <?php $form = ActiveForm::begin(); ?>

   <!-- --><?/*= $form->field($model, 'user_id')->textInput() */?>

    <?= $form->field($model, 'contact_type')->dropDownList($model->getUserContactTypeOptions(),
        ['prompt'=>'What type of contact is this?'])->label('Type of Contact') ?>

    <?= $form->field($model, 'info')->textInput(['maxlength' => true])
    ->label('Contact Information')?>
    <p>e.g. phone number,qq,weixin......</p>
    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>
    <p>Specify any additional details the person may need to reach you with this information</p>
    <?/*= $form->field($model, 'status')->textInput() */?>

    <?/*= $form->field($model, 'created_at')->textInput() */?>

    <?/*= $form->field($model, 'updated_at')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
