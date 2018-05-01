<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/5/1
 * Time: 上午10:52
 */
use yii\helpers\Html;
use app\models\User;
?>

<div class="meeting-note-view">
    <p>Email:</p>
    <p>
        <?= User::find()->where(['id' => $model->participant_id])->one()->email?>
    </p>

</div>