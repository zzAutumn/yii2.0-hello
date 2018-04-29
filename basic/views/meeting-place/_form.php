<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;
use app\assets\AppAsset;
AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\MeetingPlace */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile("@web/js/meetplaceform.js");
?>

<div class="mmeeting-place-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    <h3>Choose one of your places</h3>

    <div class="row">
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose Place <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" id="item1" onclick="setValue1()">新会议室二楼</a></li>
                        <li><a href="#" id="item2" onclick="setValue2()">老会议室二楼</a></li>
                        <li><a href="#" id="item3" onclick="setValue3()">其他地方</a></li>
                    </ul>
                </div><!-- /btn-group -->
                <input type="text" class="form-control" id="input" name="input">
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->

    </div><!-- /.row -->


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
