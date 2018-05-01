<?php
  use yii\helpers\Html;
  use yii\grid\GridView;
  use yii\widgets\Pjax;
?>
<p></p>
<?php Pjax::begin() ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
    [
      'label'=>'Meeting-Type',
        'attribute' => 'meeting_type',
        'format' => 'raw',
        'value' => function ($model) {
                    return '<div>'.$model->getMeetingType($model->meeting_type).' '.'</div>';
            },
    ],
        'message',
        //'updated_at:datetime',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
<?php Pjax::end() ?>
    <!--<p>
        <?/*= Html::a('Create {modelClass}', ['modelClass' => 'MMeeting']), ['create'], ['class' => 'btn btn-success'] */?>
    </p>-->