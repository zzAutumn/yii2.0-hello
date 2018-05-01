<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\MFriend */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mfriends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mfriend-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'user_id',
            //'friend_id',
            //'status',
            //'number_meetings',
            //'is_favorite',
            [
                    'label' => 'Friend Email',
                    'value' => User::findOne($model->friend_id)->username,
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>

