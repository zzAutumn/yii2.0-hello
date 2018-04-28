<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSettingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-setting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'filename') ?>

    <?= $form->field($model, 'avatar') ?>

    <?= $form->field($model, 'reminder_eve') ?>

    <?php // echo $form->field($model, 'reminder_hours') ?>

    <?php // echo $form->field($model, 'contact_share') ?>

    <?php // echo $form->field($model, 'no_email') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
