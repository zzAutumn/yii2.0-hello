<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserContact */

$this->title = 'Create User Contact';
$this->params['breadcrumbs'][] = ['label' => 'User Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
