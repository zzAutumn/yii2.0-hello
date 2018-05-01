<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Information';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contact-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>You can add phone numbers and other information to share with your meeting contacts.
        Only add contacts that you wish to share with meeting participants
        </p>
    <p>
        <?= Html::a('Add Contact Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_grid', [
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
    ]) ?>

   <!-- --><?/*= GridView::widget([
            //'model' => $model,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            //'contact_type',
            'info',
            //'details:ntext',
            //'status',
            //'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
</div>
