<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\StatusAsset;
StatusAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <?//= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <!-- use redactor text editor -->
    <!-- add an imageUpload option use Redactor widget-->
        <div class="col-md-8">
            <?= $form->field($model, 'message')->widget(\yii\redactor\widgets\Redactor::className(),
                [
                    'clientOptions' => [
                        //'imageManagerJson' => ['/redactor/upload/image-json'],
                        //'imageUpload' => ['/redactor/upload/image'],
                        //'fileUpload' => ['/redactor/upload/file'],
                        //'lang' => 'zh_cn',
                        //'plugins' => ['clips', 'fontcolor','imagemanager'],
                    ],

                ]

            ) ?>

        </div>
        <div class="col-md-4">
            <p>Remaining: <span id="counter2">0</span></p>
        </div>



    <?/*= $form->field($model, 'permissions')->dropDownList($model->getPermissions(),
        ['prompt'=>'- choose your permission -'])*/?>

    <?/*= $form->field($model, 'created_at')->textInput() */?><!--

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>






