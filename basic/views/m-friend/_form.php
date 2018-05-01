<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MFriend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mfriend-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->errorSummary($model);?>

    <?= $form->field($model, 'email')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
