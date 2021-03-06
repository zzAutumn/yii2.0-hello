<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserContact */

$this->title = 'Contact information';
$this->params['breadcrumbs'][] = ['label' => 'User Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contact-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    $type = $model->getUserContactTypeOptions()[$model->contact_type];
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'contact_type',
            [
                'label'=>'contact_type',
                'value'=> $type,
            ],
            'info',
            'details:ntext',
            //'status',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>

