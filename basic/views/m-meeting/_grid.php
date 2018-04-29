<?php
  use yii\helpers\Html;
  use yii\grid\GridView;
?>
<p></p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
    [
      'label'=>'Meeting',
        'attribute' => 'meeting_type',
        'format' => 'raw',
        'value' => function ($model) {
                    return '<div>'.$model->getMeetingType($model->meeting_type).' '.'</div>';
            },
    ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

    <!--<p>
        <?/*= Html::a('Create {modelClass}', ['modelClass' => 'MMeeting']), ['create'], ['class' => 'btn btn-success'] */?>
    </p>-->