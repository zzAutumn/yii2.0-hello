<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MFriend;
/* @var $this yii\web\View */
/* @var $model app\models\Participant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mparticipant-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    <p>Email address:</p>
    <?php
    // preload friends into array

    $friend_list = MFriend::find()->where(['user_id'=>Yii::$app->getUser()->id])->all();
    $email_list = [];
    foreach ($friend_list as $x){
        $email_list[] = $x->oldAttributes["email"];
    }

    echo yii\jui\AutoComplete::widget([
        'model' => $model,
        'name' => 'email',
        'clientOptions' => [
            'source' => $email_list,]
    ]);
    ?>
   <!-- <?/*= $form->field($model, 'invited_by')->textInput() */?>

    <?/*= $form->field($model, 'status')->textInput() */?>

    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
