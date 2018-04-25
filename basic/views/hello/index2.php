<?php
use yii\widgets\DetailView;
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider'=>$dataProvider,
    'itemView'=>'index2',
]);

//var_dump($dataProvider);
