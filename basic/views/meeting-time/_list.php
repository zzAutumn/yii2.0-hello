<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/4/29
 * Time: 上午10:10
 */
use yii\helpers\Html;
?>

<div class="meeting-time-view">

    <p>
        <?= Yii::$app->formatter->asDatetime($model->start) ?>
    </p>

</div>